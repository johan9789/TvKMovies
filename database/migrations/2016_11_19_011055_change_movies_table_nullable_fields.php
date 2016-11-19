<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ChangeMoviesTableNullableFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('movies', function(Blueprint $table){
			$table->string('length')->nullable()->change();
			$table->string('cover')->nullable()->change();
			$table->boolean('in_pc')->default(false)->change();
			$table->integer('file_type_id')->nullable()->change();
			$table->string('quality')->nullable();
			$table->string('synopsis')->nullable();
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}

}