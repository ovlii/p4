<?php

class OvliiSeeder extends Seeder {

	public function run() {

		# Clear the tables to a blank slate
		DB::statement('SET FOREIGN_KEY_CHECKS=0'); # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
		DB::statement('TRUNCATE listings');
		DB::statement('TRUNCATE locations');
		DB::statement('TRUNCATE categories');
		DB::statement('TRUNCATE listing_category');
		DB::statement('TRUNCATE listing_location');
        DB::statement('TRUNCATE category_listing');
		DB::statement('TRUNCATE users');

		$faker = Faker\Factory::create('en_US');

        # Categories
		$electronics  = Category::create(array('name' => 'Electronics'));
		$mobile       = Category::create(array('name' => 'Mobile'));
		$realestate   = Category::create(array('name' => 'Real Estate'));
		$services     = Category::create(array('name' => 'Services'));
		$books        = Category::create(array('name' => 'Books'));
		$jobs    	  = Category::create(array('name' => 'Jobs'));
		$business  	  = Category::create(array('name' => 'Business'));


        #listings
		for ($i = 0; $i < 5; $i++)
		{
			$listing = Listing::create(array(
				'short_title' => $faker->sentence($nbWords = 6),
				'description' => $faker->sentence($nbWords = 50),
				'full_name' => $faker->name,
				'email_address' => $faker->email,
                'price' => 1000,
				'phone_number' => $faker->phoneNumber,
                'enable_flag' => 'Y'
			));

            $location = Location::create(array(
				'name' => $faker->city
			));
            
            $location->save();

            $listing->location()->associate($location);
            
			$listing->save();

            $listing->categories()->attach($electronics);
            $listing->categories()->attach($mobile);
            
		}
        
        #listings
		for ($i = 0; $i < 5; $i++)
		{
			$listing = Listing::create(array(
				'short_title' => $faker->sentence($nbWords = 6),
				'description' => $faker->sentence($nbWords = 50),
				'full_name' => $faker->name,
				'email_address' => $faker->email,
                'price' => 1000,
				'phone_number' => $faker->phoneNumber,
                'enable_flag' => 'Y'
			));

            $location = Location::create(array(
				'name' => $faker->city
			));
            
            $location->save();

            $listing->location()->associate($location);
            
			$listing->save();

            $listing->categories()->attach($realestate);
            
		}
        
        #listings
		for ($i = 0; $i < 5; $i++)
		{
			$listing = Listing::create(array(
				'short_title' => $faker->sentence($nbWords = 6),
				'description' => $faker->sentence($nbWords = 50),
				'full_name' => $faker->name,
				'email_address' => $faker->email,
                'price' => 1000,
				'phone_number' => $faker->phoneNumber,
                'enable_flag' => 'Y'
			));

            $location = Location::create(array(
				'name' => $faker->city
			));
            
            $location->save();

            $listing->location()->associate($location);
            
			$listing->save();

            $listing->categories()->attach($services);
            
		}

        #listings
		for ($i = 0; $i < 5; $i++)
		{
			$listing = Listing::create(array(
				'short_title' => $faker->sentence($nbWords = 6),
				'description' => $faker->sentence($nbWords = 50),
				'full_name' => $faker->name,
				'email_address' => $faker->email,
                'price' => 1000,
				'phone_number' => $faker->phoneNumber,
                'enable_flag' => 'Y'
			));

            $location = Location::create(array(
				'name' => $faker->city
			));
            
            $location->save();

            $listing->location()->associate($location);
            
			$listing->save();

            $listing->categories()->attach($jobs);
            
		}
		$user = new User;
		$user->email      = 'admin15@gmail.com';
		$user->password   = Hash::make('admin1234');
		$user->first_name = 'Admin';
		$user->last_name  = 'Seaborn';
        $user->user_role  = 'Admin';
		$user->save();

		$user = new User;
		$user->email      = 'user15@gmail.com';
		$user->password   = Hash::make('user1234');
		$user->first_name = 'User';
		$user->last_name  = 'Seaborn';
        $user->user_role  = 'User';
		$user->save();
    

	}

}