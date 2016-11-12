<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFileTypesTable extends Migration {

	public function up()
	{
		Schema::create('file_types', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type');
			$table->string('real_name');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('file_types');
	}
}