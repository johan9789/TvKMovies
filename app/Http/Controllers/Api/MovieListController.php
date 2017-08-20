<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Movie;
use BadMethodCallException;

class MovieListController extends Controller {

    public function index(Movie $movie, Request $request, $scope=null){
        $orderBy = $request->get('order_by');
        $paginate = $request->get('paginate');
        $limit = $request->get('limit');
        $count = $request->get('count');

        if($scope){
            if($scope == 'random'){
                $movies = $movie->inRandomOrder();
            } else {
                try {
                    $movies = $movie->{$scope}();

                    if($orderBy){
                        $movies = $movies->orderBy($orderBy, $request->get('mode', 'asc'));
                    }

                    if($request->get('random')){
                        $movies = $movies->inRandomOrder();
                    }
                } catch(BadMethodCallException $e){
                    return response()->json(['error' => 'Movie list not available.']);
                }
            }
            if($paginate){
                return $movies->paginate($paginate);
            }
            $movies = $movies->get();
        } else {
            $movies = $movie->all();
        }

        if($limit){
            $movies = $movies->take($limit);
        }

        if($count){
            $movies = $movies->count();
        }

        return $movies;
    }

    public function postUpdateStatus(Request $request){
        $movie = Movie::findOrFail($request->get('movie_id'));

        $currentStatus = $request->get('status');

        $possibleStatus = '';

        if($currentStatus == '✘'){
            $possibleStatus = 1;
        } else if($currentStatus == '✔'){
            $possibleStatus = 0;
        }

        $movie->seen = $possibleStatus;
        $movie->save();
        return $movie;
    }

}
