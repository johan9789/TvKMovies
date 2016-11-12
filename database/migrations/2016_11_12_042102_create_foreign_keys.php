<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('movies', function(Blueprint $table) {
			$table->foreign('file_type_id')->references('id')->on('file_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('movies', function(Blueprint $table) {
			$table->foreign('genre_id')->references('id')->on('genres')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('movies', function(Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('series', function(Blueprint $table) {
			$table->foreign('genre_id')->references('id')->on('genres')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('series', function(Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('serie_chapters', function(Blueprint $table) {
			$table->foreign('file_type_id')->references('id')->on('file_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('serie_chapters', function(Blueprint $table) {
			$table->foreign('season_id')->references('id')->on('seasons')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('seasons', function(Blueprint $table) {
			$table->foreign('serie_id')->references('id')->on('series')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('movies', function(Blueprint $table) {
			$table->dropForeign('movies_file_type_id_foreign');
		});
		Schema::table('movies', function(Blueprint $table) {
			$table->dropForeign('movies_genre_id_foreign');
		});
		Schema::table('movies', function(Blueprint $table) {
			$table->dropForeign('movies_country_id_foreign');
		});
		Schema::table('series', function(Blueprint $table) {
			$table->dropForeign('series_genre_id_foreign');
		});
		Schema::table('series', function(Blueprint $table) {
			$table->dropForeign('series_country_id_foreign');
		});
		Schema::table('serie_chapters', function(Blueprint $table) {
			$table->dropForeign('serie_chapters_file_type_id_foreign');
		});
		Schema::table('serie_chapters', function(Blueprint $table) {
			$table->dropForeign('serie_chapters_season_id_foreign');
		});
		Schema::table('seasons', function(Blueprint $table) {
			$table->dropForeign('seasons_serie_id_foreign');
		});
	}
}