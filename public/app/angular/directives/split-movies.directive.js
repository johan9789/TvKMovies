(function(){
    'use strict';

    function SplitMoviesController($scope, $http){
        const vm = this;

        $http.get(url.api.movieList[$scope.scope], {params: {limit: 12}}).then(function(response){
            vm.movies = response.data;
        });
    }

    function splitMoviesDirective(){
        return {
            restrict: 'E',
            scope: {
                scope: '@'
            },
            controller: ['$scope', '$http', SplitMoviesController],
            controllerAs: 'split',
            templateUrl: 'app/angular/directives/split-movies.template.html'
        }
    }

    app.directive('splitMovies', splitMoviesDirective);
})();
