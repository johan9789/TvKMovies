<?php
namespace App\Http\Controllers;

use App\Entities\Movie;

class MoviesController extends Controller {

    public function downloaded(Movie $movie){
        $downloaded_movies = $movie->where('downloaded', true)->orderBy('release_date', 'desc')->paginate(24);
        $random_movies = $movie->inRandomOrder()->take(9)->get();
        return view('movies.downloaded', compact('downloaded_movies', 'random_movies'));
    }
    
}