<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('phone', 255);
			$table->string('email', 255);
			$table->string('password', 255);
			$table->date('d_o_b');
			$table->date('last_donation_date');
			$table->smallInteger('code');
			$table->integer('city_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}