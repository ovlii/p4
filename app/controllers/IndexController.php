<?php

class IndexController extends BaseController {

	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

	}

	/**
	*
	*/
	public function getIndex() {

		$query  = Input::get('query');

		$listings = Listing::search($query);

			return View::make('index')
				->with('listings', $listings)
				->with('query', $query);

	}

}