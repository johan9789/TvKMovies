<?php
namespace App\Http\Controllers;

use App\Entities\Movie;

class HomeController extends Controller {

    public function index(Movie $movie){
        $last_movies = $movie->orderBy('release_date', 'desc')->take(100)->get();
        return view('index', compact('last_movies'));
    }
    
}