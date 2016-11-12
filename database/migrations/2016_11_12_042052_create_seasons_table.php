<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeasonsTable extends Migration {

	public function up()
	{
		Schema::create('seasons', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('number')->default('1');
			$table->integer('serie_id')->unsigned();
			$table->datetime('release_date');
			$table->string('synopsis');
		});
	}

	public function down()
	{
		Schema::drop('seasons');
	}
}