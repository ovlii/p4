<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	# Create the categories table
	public function up() 
	{
		Schema::create('categories', function($table) {
			
			# AI, PK
			$table->increments('id');
			
			# created_at, updated_at columns
			$table->timestamps();
			
			# General data....
			$table->string('name', 100);
			
			# Define foreign keys...
			# none needed

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
