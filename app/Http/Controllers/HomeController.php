<?php
namespace App\Http\Controllers;

use App\Entities\Movie;

class HomeController extends Controller {

    public function index(Movie $movie){
        $lastMovies = $movie->last()->take(15)->get();
        $soonMovies = $movie->soon()->inRandomOrder()->take(12)->get();
        $pendingMovies = $movie->pending()->inRandomOrder()->take(12)->get();
        $topRatedMovies = $movie->topRated()->take(12)->get();
        $recentlyDownloadedMovies = $movie->downloaded()->take(12)->get();
        $nextReleases = $movie->nextReleases()->take(5)->get();
        return view('index', compact('lastMovies', 'soonMovies', 'topRatedMovies', 'recentlyDownloadedMovies', 'pendingMovies', 'nextReleases'));
    }

    public function qualifyMovie($movieId, $qualification){
        $movie = Movie::findOrFail($movieId);
        $movie->rating = $qualification;
        $movie->save();
    }
    
}
