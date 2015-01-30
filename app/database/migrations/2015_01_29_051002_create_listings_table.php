<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listings', function($table) {

			# AI, PK
			$table->increments('id');
			
			# created_at, updated_at columns
			$table->timestamps();
			
			# General data...
			$table->string('short_title');
			$table->integer('location_id')->unsigned(); 
			$table->string('description');
			$table->string('full_name');
			$table->string('email_address');
			$table->string('phone_number');
			$table->integer('price');
            $table->string('enable_flag');
			
			# Define foreign keys...
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
		Schema::drop('listings');
	}

}
