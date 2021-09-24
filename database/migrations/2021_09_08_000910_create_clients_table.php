<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 25);
			$table->string('phone', 25)->unique();
			$table->string('email', 25);
			$table->string('password', 25);
			$table->date('d_o_b');
			$table->date('last_donation_date');
			$table->Integer('code')->default(00000);
			$table->integer('city_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
            $table->string('api_token',60)->unique()->nullable();
            $table->tinyInteger('is_active')->default(1);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
