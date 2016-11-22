<?php
namespace App\Http\Controllers;

use App\Entities\Movie;

class HomeController extends Controller {

    public function index(Movie $movie){
        $lastMovies = $movie->where('release_date', '<=', date('Y-m-d'))
                            ->orderBy('release_date', 'desc')
                            ->take(15)->get();
        $soonMovies = $movie->where('release_date', '<=', date('Y-m-d'))
                            ->where('downloaded', false)
                            ->inRandomOrder()->take(12)->get();
        $pendingMovies = $movie->where('downloaded', true)
                                ->where('seen', false)
                                ->inRandomOrder()->take(12)->get();
        $topRatedMovies = $movie->where('downloaded', true)
                                ->orderBy('rating', 'desc')
                                ->orderBy('release_date', 'desc')
                                ->take(12)->get();
        $recentlyDownloadedMovies = $movie->where('downloaded', true)
                                ->orderBy('release_date', 'desc')
                                ->take(12)->get();
        return view('index', compact('lastMovies', 'soonMovies', 'topRatedMovies', 'recentlyDownloadedMovies', 'pendingMovies'));
    }
    
}