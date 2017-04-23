<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'movie-list'], function(){
    Route::get('next-releases/{limit?}', 'Api\MovieListController@getNextReleases')->name('api.movie_list.next_releases');
    Route::get('soon/{limit?}', 'Api\MovieListController@getSoon')->name('api.movie_list.soon');
    Route::post('update-status', 'Api\MovieListController@postUpdateStatus')->name('api.movie_list.update_status');
});

Route::resource('countries', 'Api\CountriesController', ['as' => 'api', 'only' => ['index']]);
Route::resource('genres', 'Api\GenresController', ['as' => 'api', 'only' => ['index']]);
Route::resource('qualities', 'Api\QualitiesController', ['as' => 'api', 'only' => ['index']]);

Route::get('/user', function(Request $request){
    return $request->user();
})->middleware('auth:api');
