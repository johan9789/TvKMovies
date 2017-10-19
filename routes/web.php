<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'movies'], function () {
	Route::get('quality/{quality?}', 'MoviesController@quality')->name('movies.quality');
	Route::get('future', 'MoviesController@future')->name('movies.future');
	Route::get('soon', 'MoviesController@soon')->name('movies.soon');
	Route::get('pending', 'MoviesController@pending')->name('movies.pending');	
    Route::get('downloaded', 'MoviesController@downloaded')->name('movies.downloaded');
});

Route::post('qualify-movie', 'HomeController@qualifyMovie')->name('qualify-movie');

Route::get('/', 'HomeController@index');
