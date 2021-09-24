<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationsTable extends Migration {

	public function up()
	{
		Schema::create('donations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->smallInteger('age');
			$table->smallInteger('bags_num');
			$table->string('hospital_address');
			$table->decimal('longitude', 10,8);
			$table->decimal('latitude', 10,8);
			$table->text('details');
			$table->integer('client_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('donations');
	}
}
