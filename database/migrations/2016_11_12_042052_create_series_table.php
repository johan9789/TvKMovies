<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeriesTable extends Migration {

	public function up()
	{
		Schema::create('series', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->integer('genre_id')->unsigned();
			$table->integer('country_id')->unsigned();
			$table->string('cover');
			$table->string('synopsis');
		});
	}

	public function down()
	{
		Schema::drop('series');
	}
}