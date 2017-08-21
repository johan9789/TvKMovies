(function(){
    'use strict';

    function NextReleasesController($scope, $http){
        const vm = this;

        $http.get(url.api.movieList.nextReleases, {
            params: {limit: 5}
        }).then(function(response){
            vm.nextReleases = response.data;
        });
    }

    // Not used yet...
    app.controller('NextReleasesController', ['$scope', '$http', NextReleasesController]);
})();
