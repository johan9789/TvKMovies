<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Movie;

class MovieListController extends Controller {

    public function getNextReleases(Movie $movie, $limit=5){
        return $movie->nextReleases()->take($limit)->get();
    }

    public function getSoon(Movie $movie, $limit=12){
        return $movie->soon()->inRandomOrder()->take($limit)->get();
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
