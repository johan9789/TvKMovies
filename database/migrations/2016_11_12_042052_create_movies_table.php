<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMoviesTable extends Migration {

	public function up()
	{
		Schema::create('movies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('other_name');
			$table->string('length');
			$table->string('cover');
			$table->boolean('is_3d')->default(false);
			$table->boolean('in_pc')->default(true);
			$table->boolean('in_disk')->default(false);
			$table->softDeletes();
			$table->timestamps();
			$table->datetime('release_date');
			$table->boolean('seen')->default(false);
			$table->integer('file_type_id')->unsigned();
			$table->integer('genre_id')->unsigned();
			$table->integer('country_id')->unsigned();
			$table->boolean('downloaded')->default(false);
			$table->string('quality', 10);
			$table->string('synopsis', 100);
		});
	}

	public function down()
	{
		Schema::drop('movies');
	}
}