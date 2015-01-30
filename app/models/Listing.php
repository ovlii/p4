<?php

class Listing extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * Listing belongs to Location
    * Define an inverse one-to-many relationship.
    */
	public function location() {

        return $this->belongsTo('Location');

    }

    /**
    * Listings belong to many Categories
    */
    public function categories() {

        return $this->belongsToMany('Category');

    }

    /**
    * This array will compare an array of given tags with existing tags
    * and figure out which ones need to be added and which ones need to be deleted
    */
    public function updateCategories($new = array()) {

        // Go through new tags to see what ones need to be added
        foreach($new as $category) {
            if(!$this->$categories->contains($category)) {
                $this->categories()->save(Category::find($category));
            }
        }

        // Go through existing tags and see what ones need to be deleted
        foreach($this->$categories as $category) {
            if(!in_array($category->pivot->category_id,$new)) {
                $this->categories()->detach($category->id);
            }
        }
    }

    /**
    * Search among books, authors and tags
    * @return Collection
    */
    public static function search($query) {

        # If there is a query, search the library with that query
        if($query) {

            # Eager load tags and author
            $listings = Listing::with('categories','location')
            ->whereHas('location', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhereHas('categories', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhere('short_title', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

            # Note on what `use` means above:
            # Closures may inherit variables from the parent scope.
            # Any such variables must be passed to the `use` language construct.

        }
        # Otherwise, just fetch all listings
        else {
            # Eager load categories and location
            $listings = Listing::with('categories','location')->get();
        }

        return $listings;
    }



    /**
    * Searches and returns any books added in the last 24 hours
    *
    * @return Collection
    */
    public static function getListingsAddedInTheLast24Hours() {

        # Timestamp of 24 hours ago
        $past_24_hours = strtotime('-1 day');

        # Convert to MySQL timestamp
        $past_24_hours = date('Y-m-d H:i:s', $past_24_hours);

        $books = Book::where('created_at','>',$past_24_hours)->get();

        return $listings;

    }


    /**
    *
    *
    * @return String
    */
    public static function sendDigests($users,$listings) {

        $recipients = '';

        $data['listings'] = $listings;

        foreach($users as $user) {

            $data['user'] = $user;

            /*
            Mail::send('emails.digest', $data, function($message) {

                $recipient_email = $user->email;
                $recipient_name  = $user->first_name.' '.$user->last_name;
                $subject  = 'Foobooks Digest';

                $message->to($recipient_email, $recipient_name)->subject($subject);

            });
            */

            $recipients .= $user->email.', ';

        }

        $recipients = rtrim($recipients, ',');

        return $recipients;

    }


}