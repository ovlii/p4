<?php

class ListingController extends \BaseController {


	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		$this->beforeFilter('auth', array('except' => ['getIndex','getDigest']));

	}


	/**
	* Used as an example for something you might want to set up a cron job for
	*/
	public function getDigest() {

		$listings = Listing::getListingsAddedInTheLast24Hours();

		$users = User::all();

		$recipients = Listing::sendDigests($users,$listings);

		$results = 'Listing digest sent to: '.$recipients;

		Log::info($results);

		return $results;

	}


	/**
	* Process the searchform
	* @return View
	*/
	public function getSearch() {

		return View::make('listing_search');

	}


	/**
	* Display all Listings
	* @return View
	*/
	public function getIndex() {

		$query  = Input::get('query');

		$listings = Listing::search($query);

			return View::make('listing_index')
				->with('listings', $listings)
				->with('query', $query);
	}


	/**
	* Show the "Add a listing form"
	* @return View
	*/
	public function getCreate() {

		$locations = Location::getIdNamePair();

		$categories = Category::getIdNamePair();

    	return View::make('listing_add')
    		->with('locations',$locations)
    		->with('categories',$categories);

	}


	/**
	* Process the "Add a listing form"
	* @return Redirect
	*/
	public function postCreate() {

		# Instantiate the listing model
		$listing = new Listing();

		$listing->fill(Input::except('categories'));

		# Note this save happens before we enter any tags (next step)
		$listing->save();

		foreach(Input::get('categories') as $category) {

			# This enters a new row in the book_tag table
			$listing->categories()->save(Category::find($category));

		}

		return Redirect::action('ListingController@getIndex')->with('flash_message','Your listing has been added.');

	}


	/**
	* Show the "Edit a book form"
	* @return View
	*/
	public function getEdit($id) {

		try {

			# Get all the authors (used in the author drop down)
			$locations = Location::getIdNamePair();

			# Get this book and all of its associated tags
		    $listing    = Listing::with('categories')->findOrFail($id);

		    # Get all the tags (not just the ones associated with this book)
		    $categories    = Category::getIdNamePair();
		}
		catch(exception $e) {
		    return Redirect::to('/listing')->with('flash_message', 'Listing not found');
		}

    	return View::make('listing_edit')
    		->with('listing', $listing)
    		->with('locations', $locations)
    		->with('categories', $categories);

	}


	/**
	* Process the "Edit a book form"
	* @return Redirect
	*/
	public function postEdit() {

		try {
	        $listing = Listing::with('categories')->findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/listing')->with('flash_message', 'Listing not found');
	    }

	    try {
		    # http://laravel.com/docs/4.2/eloquent#mass-assignment
		    $listing->fill(Input::except('categories'));
		    $listing->save();

		    # Update tags associated with this book
		    if(!isset($_POST['categories'])) $_POST['categories'] = array();
		    $listing->updateTags($_POST['categories']);

		   	return Redirect::action('ListingController@getIndex')->with('flash_message','Your changes have been saved.');

		}
		catch(exception $e) {
	        return Redirect::to('/listing')->with('flash_message', 'Error saving changes.');
	    }

	}


	/**
	* Process book deletion
	*
	* @return Redirect
	*/
	public function postDelete() {

		try {
	        $listing = Listing::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/listing/')->with('flash_message', 'Could not delete listing - not found.');
	    }

	    Listing::destroy(Input::get('id'));

	    return Redirect::to('/listing/')->with('flash_message', 'Listing deleted.');

	}


	/**
	* Process a book search
	* Called w/ Ajax
	*/
	public function postSearch() {

		if(Request::ajax()) {

			$query  = Input::get('query');

			# We're demoing two possible return formats: JSON or HTML
			$format = Input::get('format');

			# Do the actual query
	        $listings  = Listing::search($query);

	        # If the request is for JSON, just send the books back as JSON
	        if($format == 'json') {
		        return Response::json($listings);
	        }
	        # Otherwise, loop through the results building the HTML View we'll return
	        elseif($format == 'html') {

		        $results = '';
				foreach($listings as $listing) {
					# Created a "stub" of a view called book_search_result.php; all it is is a stub of code to display a book
					# For each book, we'll add a new stub to the results
					$results .= View::make('listing_search_result')->with('listing', $listing)->render();
				}

				# Return the HTML/View to JavaScript...
				return $results;
			}
		}
	}



}