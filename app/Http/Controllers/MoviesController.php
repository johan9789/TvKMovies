<?php
namespace App\Http\Controllers;

use App\Entities\Movie;

class MoviesController extends Controller {

    public function downloaded(Movie $movie){
        $downloadedMovies = $movie->downloaded()->paginate(24);
        $randomMovies = $movie->inRandomOrder()->take(9)->get();
        return view('movies.downloaded', compact('downloadedMovies', 'randomMovies'));
    }
    
}
