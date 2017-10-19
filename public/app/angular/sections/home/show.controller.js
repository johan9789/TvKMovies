(function(){
    'use strict';

    function ShowController($scope, $http, $movie){
        const vm = this;

        function getMovies(){
            $http.get(url.api.movieList[title], {
                params: {order_by: 'release_date', mode: 'desc', paginate: 24, page: 1}
            }).then(function(response){
                vm.movies = response.data;
                vm.pages = [];
                for(var i=1;i<=vm.movies.last_page;i++){
                    vm.pages.push(i);
                }
            });
        }

        function changePage(page, upwards){
            $http.get(url.api.movieList[title], {
                params: {order_by: 'release_date', mode: 'desc', paginate: 24, page: page}
            }).then(function(response){
                vm.movies = response.data;
            });
            if(upwards){
                up();
            }
        }

        function coverPath(cover){
            return url.path.movieCover + '/' + cover;
        }

        function qualifyMovie(movie, qualification){
            $movie.qualify(movie, qualification);
            vm.changePage(vm.movies.current_page, false);
        }

        function mouseOverStatus(movie){
            if(movie.status == '✘' || movie.status == '✔'){
                movie.status = $movie.mouseOverStatus(movie);
            }
        }

        function updateMovieStatus(movie){
            if(movie.status == '✘' || movie.status == '✔') {
                $movie.updateStatus(movie);
                vm.changePage(vm.movies.current_page, false);
            }
        }

        vm.qualifyMovie = qualifyMovie;
        vm.mouseOverStatus = mouseOverStatus;
        vm.changePage = changePage;
        vm.coverPath = coverPath;
        vm.updateMovieStatus = updateMovieStatus;
        vm.getMovies = getMovies;
    }

    ShowController.$inject = ['$scope', '$http', '$movie'];
    app.controller('ShowController', ShowController);
})();
