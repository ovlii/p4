<?php

class LocationController extends \BaseController {


	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		# Only logged in users are allowed here
		$this->beforeFilter('auth');

	}

	/**
	 * Display a ` of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		$locations = Location::all();
		return View::make('location_index')->with('locations',$locations);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('location_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

		$location = new Location;
		$location->name = Input::get('name');
		$location->save();

		return Redirect::action('LocationController@index')->with('flash_message','Your location been added.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {

		try {
			$location = Location::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/location')->with('flash_message', 'Location not found');
		}

		return View::make('location_show')->with('location', $location);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {

		try {
			$location = Location::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/category')->with('flash_message', 'Location not found');
		}

		# Pass with the $tag object so we can do model binding on the form
		return View::make('location_edit')->with('location', $location);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		try {
			$location = Location::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/location')->with('flash_message', 'Location not found');
		}

		$location->name = Input::get('name');
		$location->save();

		return Redirect::action('LocationController@index')->with('flash_message','Your location has been saved.');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {

		try {
			$location = Location::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/location')->with('flash_message', 'Location not found');
		}

		# Note there's a `deleting` Model event which makes sure book_tag entries are also destroyed
		# See Tag.php for more details
		Location::destroy($id);

		return Redirect::action('LocationController@index')->with('flash_message','Your location has been deleted.');

	}


}