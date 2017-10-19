<?php
namespace App\Http\Controllers;

use App\Entities\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function index(Movie $movie){
        $lastMovies = $movie->last()->take(15)->get();
        $nextReleases = $movie->nextReleases()->take(5)->get();
        return view('index', compact('lastMovies', 'nextReleases'));
    }

    public function qualifyMovie(Request $request){
        $movie = Movie::findOrFail($request->input('movie'));
        $movie->rating = $request->input('qualification');
        $movie->save();
        return ['success' => true];
    }

}
