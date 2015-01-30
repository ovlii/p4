<?php

class UserController extends BaseController {

	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

        $this->beforeFilter('guest',
        	array(
        		'only' => array('getLogin','getSignup')
        	));

    }

    /**
	* Show the users
	* @return View
	*/
    
	public function index() {

		$users = User::all();
		return View::make('user_index')->with('users',$users);

	}
    

    /**
	* Show the new user signup form
	* @return View
	*/
	public function getSignup() {

		return View::make('user_signup');

	}

	/**
	* Process the new user signup
	* @return Redirect
	*/
	public function postSignup() {

		# Step 1) Define the rules
		$rules = array(
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		);

		# Step 2)
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('/signup')
				->withInput()
				->withErrors($validator);
		}

		$user = new User;
		$user->first_name = Input::get('first_name');
		$user->last_name  = Input::get('last_name');
		$user->email      = Input::get('email');
		$user->user_role  = Input::get('user_role');
		$user->password = Hash::make(Input::get('password'));

		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->withInput();
		}

		# Log in
		Auth::login($user);

		$user->sendWelcomeEmail();

		return Redirect::to('/')->with('flash_message', 'Welcome to Ovliis!');

	}

	/**
	* Display the login form
	* @return View
	*/
	public function getLogin() {

		return View::make('user_login');

	}

	/**
	* Process the login form
	* @return View
	*/
	public function postLogin() {

		$credentials = Input::only('email', 'password');

		# Note we don't have to hash the password before attempting to auth - Auth::attempt will take care of that for us
		if (Auth::attempt($credentials, $remember = false)) {
			return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
		}
		else {
			return Redirect::to('/login')
				->withInput();
		}

	}

	/**
	* Logout
	* @return Redirect
	*/
	public function getLogout() {

		# Log out
		Auth::logout();

		# Send them to the homepage
		return Redirect::to('/');

	}

}