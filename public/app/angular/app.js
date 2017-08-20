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


function up(){
    var arriba;
    if(document.body.scrollTop != 0 || document.documentElement.scrollTop != 0){
        window.scrollBy(0, -15);
        arriba = setTimeout('up()', 10);
    } else {
        clearTimeout(arriba);
    }
}

app.controller('ShowController', ['$scope', '$http', function($scope, $http){

    $http.get(url.api.movieList[title], {
        params: {order_by: 'release_date', mode: 'desc', paginate: 24, page: 1}
    }).then(function(response){
        $scope.movies = response.data;

        $scope.pages = [];
        for(var i=1;i<=$scope.movies.last_page;i++){
            $scope.pages.push(i);
        }
    });

    $scope.changePage = function(page){

        $http.get(url.api.movieList[title], {
            params: {order_by: 'release_date', mode: 'desc', paginate: 24, page: page}
        }).then(function(response){
            $scope.movies = response.data;
        });

        up();
    };

    $scope.coverPath = function(cover){
        return url.path.movieCover + '/' + cover;
    };

}]);

app.directive('splitSoonMovies', function(){
    return {
        restrict : 'E',
        controller: function($scope, $http){
            $http.get(url.api.movieList.soon, {params: {random: true, limit: 12}}).then(function(response){
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
            $http.get(url.api.movieList.pending, {params: {random: true, limit: 12}}).then(function(response){
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
            $http.get(url.api.movieList.topRated, {params: {limit: 12}}).then(function(response){
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
            $http.get(url.api.movieList.downloaded, {params: {limit: 12}}).then(function(response){
                $scope.recentlyMovies = response.data;
            });
        },
        templateUrl: 'app/angular/split_recently_movies.html'
    };
});
