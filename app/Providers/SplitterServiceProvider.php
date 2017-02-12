<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Components\Splitter;

class SplitterServiceProvider extends ServiceProvider{

    public function boot(){}

    public function register(){
        $this->app->bind('Splitter', function(){
            return new Splitter;
        });
    }

}
