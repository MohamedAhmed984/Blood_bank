<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientPostTable extends Migration {

	public function up()
	{
		Schema::create('client_post', function(Blueprint $table) {
			$table->id();
			$table->bigInteger('client_id')->unsigned();
			$table->bigInteger('post_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('client_post');
	}
}