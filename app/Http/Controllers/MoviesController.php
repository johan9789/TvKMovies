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

    public function downloaded(){
        $randomMovies = $this->randomMovies;
        $title = 'Downloaded';
        return view($this->viewPath, compact('randomMovies', 'title'));
    }

    public function pending(){
        $randomMovies = $this->randomMovies;
        $title = 'Pending';
        return view($this->viewPath, compact('randomMovies', 'title'));
    }

    public function soon(){
        $randomMovies = $this->randomMovies;
        $title = 'Soon';
        return view($this->viewPath, compact('randomMovies', 'title'));
    }

    public function future(){
        $randomMovies = $this->randomMovies;
        $title = 'Future';
        return view($this->viewPath, compact('randomMovies', 'title'));
    }

    public function quality(Movie $movie, $quality='1080p'){
    	$movies = $movie->downloaded()->where('quality', $quality)->paginate(24);
        $randomMovies = $this->randomMovies;
    	$title = $quality;
    	return view($this->viewPath, compact('movies', 'randomMovies', 'title'));
    }

}
