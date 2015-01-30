<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listing_location', function($table) {

			# AI, PK
			# none needed

			# General data...
			$table->integer('listing_id')->unsigned();
			$table->integer('location_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('listing_id')->references('id')->on('listings');
			$table->foreign('location_id')->references('id')->on('locations');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('listing_location');
	}

}
