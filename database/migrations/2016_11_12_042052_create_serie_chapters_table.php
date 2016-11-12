<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSerieChaptersTable extends Migration {

	public function up()
	{
		Schema::create('serie_chapters', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->integer('chapter');
			$table->integer('file_type_id')->unsigned();
			$table->integer('season_id')->unsigned();
			$table->boolean('in_pc')->default(false);
			$table->boolean('in_disk')->default(false);
			$table->boolean('seen')->default(false);
			$table->boolean('downloaded')->default(false);
			$table->string('quality', 10);
			$table->datetime('release_date');
		});
	}

	public function down()
	{
		Schema::drop('serie_chapters');
	}
}