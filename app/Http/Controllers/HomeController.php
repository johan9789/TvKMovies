<?php
namespace App\Http\Controllers;

use App\Entities\Movie;

class HomeController extends Controller {

    public function index(Movie $movie){
        $lastMovies = $movie->last()->take(15)->get();
        $nextReleases = $movie->nextReleases()->take(5)->get();
        return view('index', compact('lastMovies', 'nextReleases'));
    }

    public function qualifyMovie($movieId, $qualification){
        $movie = Movie::findOrFail($movieId);
        $movie->rating = $qualification;
        $movie->save();
    }
    
}
