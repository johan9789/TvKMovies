<?php
namespace App\Http\Controllers;

use App\Entities\Movie;

class MoviesController extends Controller {

    public function downloaded(Movie $movie){
        $downloadedMovies = $movie->downloaded()->paginate(24);
        $randomMovies = $movie->inRandomOrder()->take(9)->get();
        // while...
        $title = 'Downloaded';
        // while...
        return view('movies.downloaded', compact('downloadedMovies', 'randomMovies', 'title'));
    }
    
    // while...
    public function pending(Movie $movie){
        $downloadedMovies = $movie->pending()->orderBy('release_date', 'desc')->paginate(24);
        $randomMovies = $movie->inRandomOrder()->take(9)->get();
        // while...
        $title = 'Pending';
        // while...
        return view('movies.downloaded', compact('downloadedMovies', 'randomMovies', 'title'));
    }

    public function soon(Movie $movie){
        $downloadedMovies = $movie->soon()->orderBy('release_date', 'desc')->paginate(24);
        $randomMovies = $movie->inRandomOrder()->take(9)->get();
        // while...
        $title = 'Soon';
        // while...
        return view('movies.downloaded', compact('downloadedMovies', 'randomMovies', 'title'));
    }

    public function future(Movie $movie){
        $downloadedMovies = $movie->future()->orderBy('release_date', 'asc')->paginate(24);
        $randomMovies = $movie->inRandomOrder()->take(9)->get();
        // while...
        $title = 'Future';
        // while...
        return view('movies.downloaded', compact('downloadedMovies', 'randomMovies', 'title'));
    }

    public function quality(Movie $movie, $quality='1080p'){
    	$downloadedMovies = $movie->downloaded()->where('quality', $quality)->paginate(24);
    	$randomMovies = $movie->inRandomOrder()->take(9)->get();

    	$title = $quality;

    	return view('movies.downloaded', compact('downloadedMovies', 'randomMovies', 'title'));
    }

    // while...

}
