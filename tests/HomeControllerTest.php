<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Entities\Movie;

class HomeControllerTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome(){
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

    public function testQualifyMovie(){
        $movie = factory(Movie::class)->make();
        $response = $this->call('GET', route('qualify-movie', ['movie_id' => $movie->id, 'qualification' => 5]));
        $this->assertEquals(200, $response->status());
        
    }

    public function testQualifyMovieError404(){
        $response = $this->call('GET', '/qualify-movie/0/1');
        $this->assertEquals(404, $response->status());
    }

}
