<?php
namespace App\Http\Controllers;

use App\Entities\Movie;

class MoviesController extends Controller {
    private $randomMovies;
    private $viewPath;

    public function __construct(Movie $movie){
        $this->randomMovies = $movie->inRandomOrder()->take(9)->get();
        $this->viewPath = 'movies.show';
    }

    public function downloaded(Movie $movie){
        $movies = $movie->downloaded()->paginate(24);
        $randomMovies = $this->randomMovies;
        $title = 'Downloaded';
        return view($this->viewPath, compact('movies', 'randomMovies', 'title'));
    }

    public function pending(Movie $movie){
        $movies = $movie->pending()->orderBy('release_date', 'desc')->paginate(24);
        $randomMovies = $this->randomMovies;
        $title = 'Pending';
        return view($this->viewPath, compact('movies', 'randomMovies', 'title'));
    }

    public function soon(Movie $movie){
        $movies = $movie->soon()->orderBy('release_date', 'desc')->paginate(24);
        $randomMovies = $this->randomMovies;
        $title = 'Soon';
        return view($this->viewPath, compact('movies', 'randomMovies', 'title'));
    }

    public function future(Movie $movie){
        $movies = $movie->future()->orderBy('release_date', 'asc')->paginate(24);
        $randomMovies = $this->randomMovies;
        $title = 'Future';
        return view($this->viewPath, compact('movies', 'randomMovies', 'title'));
    }

    public function quality(Movie $movie, $quality='1080p'){
    	$movies = $movie->downloaded()->where('quality', $quality)->paginate(24);
        $randomMovies = $this->randomMovies;
    	$title = $quality;
    	return view($this->viewPath, compact('movies', 'randomMovies', 'title'));
    }

}
