var app = angular.module('tvkMoviesApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.controller('MainMenuController', ['$scope', '$http', function($scope, $http){
    $http.get(url.api.genres, {params: {ordered: 5}}).then(function(response){
        $scope.genresList = response.data;
    });

    $http.get(url.api.qualities, {params: {ordered: 5}}).then(function(response){
        $scope.qualityList = response.data;
    });

    $http.get(url.api.countries, {params: {ordered: 5}}).then(function(response){
        $scope.countryList = response.data;
    });
}]);

app.directive('splitSoonMovies', function(){
    return {
        restrict : 'E',
        controller: function($scope, $http){
            $http.get(url.api.movieList.soon).then(function(response){
                $scope.soonMovies = response.data;
            });
        },
        templateUrl: 'app/angular/split_soon_movies.html'
    };
});

app.directive('splitPendingMovies', function(){
    return {
        restrict : 'E',
        controller: function($scope, $http){
            $http.get(url.api.movieList.pending).then(function(response){
                $scope.pendingMovies = response.data;
            });
        },
        templateUrl: 'app/angular/split_pending_movies.html'
    };
});

app.directive('splitTopRatedMovies', function(){
    return {
        restrict : 'E',
        controller: function($scope, $http){
            $http.get(url.api.movieList.topRated).then(function(response){
                $scope.topRatedMovies = response.data;
            });
        },
        templateUrl: 'app/angular/split_top_rated_movies.html'
    };
});

app.directive('splitRecentlyMovies', function(){
    return {
        restrict : 'E',
        controller: function($scope, $http){
            $http.get(url.api.movieList.recently).then(function(response){
                $scope.recentlyMovies = response.data;
            });
        },
        templateUrl: 'app/angular/split_recently_movies.html'
    };
});
