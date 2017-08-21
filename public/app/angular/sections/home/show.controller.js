(function(){
    'use strict';

    function ShowController($scope, $http){
        const vm = this;

        $http.get(url.api.movieList[title], {
            params: {order_by: 'release_date', mode: 'desc', paginate: 24, page: 1}
        }).then(function(response){
            vm.movies = response.data;
            vm.pages = [];
            for(var i=1;i<=vm.movies.last_page;i++){
                vm.pages.push(i);
            }
        });

        vm.changePage = function(page){
            $http.get(url.api.movieList[title], {
                params: {order_by: 'release_date', mode: 'desc', paginate: 24, page: page}
            }).then(function(response){
                vm.movies = response.data;
            });
            up();
        };

        vm.coverPath = function(cover){
            return url.path.movieCover + '/' + cover;
        };

        function up(){
            var arriba;
            if(document.body.scrollTop != 0 || document.documentElement.scrollTop != 0){
                window.scrollBy(0, -15);
                arriba = setTimeout('up()', 10);
            } else {
                clearTimeout(arriba);
            }
        }
    }

    app.controller('ShowController', ['$scope', '$http', ShowController]);
})();
