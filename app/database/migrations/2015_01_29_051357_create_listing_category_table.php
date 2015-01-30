<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listing_category', function($table) {

			# AI, PK
			# none needed

			# General data...
			$table->integer('listing_id')->unsigned();
			$table->integer('category_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('listing_id')->references('id')->on('listings');
			$table->foreign('category_id')->references('id')->on('categories');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('listing_category');
	}

}
