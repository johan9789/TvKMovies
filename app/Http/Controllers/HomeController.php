<?php
namespace App\Http\Controllers;

use App\Entities\Movie;

class HomeController extends Controller {

    public function index(Movie $movie){
        $last_movies = $movie->where('release_date', '<=', date('Y-m-d'))
                            ->orderBy('release_date', 'desc')
                            ->take(15)->get();
        return view('index', compact('last_movies'));
    }
    
}