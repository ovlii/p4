<?php

class Category extends Eloquent {

	# Enable fillable on the 'name' column so we can use the Model shortcut Create
	protected $fillable = array('name');

    public function listings() {
        # Categories belong to many Listings
        return $this->belongsToMany('Listing');
    }


	# Model events...
	# http://laravel.com/docs/eloquent#model-events
	public static function boot() {

        parent::boot();

        static::deleting(function($tag) {
            DB::statement('DELETE FROM listing_category WHERE category_id = ?', array($category->id));
        });

	}

    /**
    *
    * @return Array
    */
    public static function getIdNamePair() {

        $categories = Array();

        $collection = Category::all();

        foreach($collection as $category) {
            $categories[$category->id] = $category->name;
        }

        return $categories;
    }


}