<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Movie;

class MovieListController extends Controller {

    public function getNextReleases(Movie $movie, Request $request){
        $limit = $request->get('limit');

        $nextReleases = $movie->nextReleases();

        if($limit){
            $nextReleases = $nextReleases->take($limit);
        }

        return $nextReleases->get();
    }

    public function getSoon(Movie $movie, $limit=12){
        return $movie->soon()->inRandomOrder()->take($limit)->get();
    }

    public function getPending(Movie $movie, $limit=12){
        return $movie->pending()->inRandomOrder()->take($limit)->get();
    }

    public function getRandom(Movie $movie, $limit=9){
        return $movie->inRandomOrder()->take($limit)->get();
    }

    public function getTopRated(Movie $movie, $limit=12){
        return $movie->topRated()->take($limit)->get();
    }

    public function getRecently(Movie $movie, $limit=12){
        return $movie->downloaded()->take($limit)->get();
    }

    public function postUpdateStatus(Request $request){
        $movie = Movie::findOrFail($request->get('movie_id'));

        $current_status = $request->get('status');

        $possible_status = '';

        if($current_status == '✘'){
            $possible_status = 1;
        } else if($current_status == '✔'){
            $possible_status = 0;
        }

        $movie->seen = $possible_status;
        $movie->save();
        return $movie;
    }

}
