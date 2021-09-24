<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('phone');
			$table->string('email');
			$table->string('fac_link');
			$table->string('insta_link');
			$table->string('tweet_link');
			$table->string('tube_link');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}