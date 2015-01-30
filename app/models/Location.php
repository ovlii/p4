<?php

class Location extends Eloquent {

	/**
	* Identify relation between Location and Listing
	*/
	public function listing() {
        # Location has many Listings
        # Define a one-to-many relationship.
        return $this->hasMany('Listing');
    }

    /**
	* When editing or adding a new listing, we need a select dropdown of locations to choose from
	* A select is easy to generate when you have a key=>value pair to work with
	* This method will generate a key=>value pair of location id => location name
	*
	* @return Array
	*/
    public static function getIdNamePair() {

		$locations = Array();

		$collection = Location::all();

		foreach($collection as $location) {
			$locations[$location->id] = $location->name;
		}

		return $locations;
	}


}