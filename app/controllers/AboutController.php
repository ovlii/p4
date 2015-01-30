<?php

class AboutController extends BaseController {

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

			return View::make('about');

	}

}