<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryListingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_listing', function($table) {

			# AI, PK
			# none needed

			# General data...
			$table->integer('category_id')->unsigned();
			$table->integer('listing_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('category_id')->references('id')->on('categories');
			$table->foreign('listing_id')->references('id')->on('listings');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_listing');
	}

}
