<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->text('notification_setting_text');
			$table->text('about_app');
			$table->string('fac_link');
			$table->string('insta_link');
			$table->string('tweet_link');
			$table->string('tube_link');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}