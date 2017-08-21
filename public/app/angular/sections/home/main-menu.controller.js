(function(){
    'use strict';

    function MainMenuController($scope, $http){
        const vm = this;

        $http.get(url.api.genres, {params: {ordered: 5}}).then(function(response){
            vm.genresList = response.data;
        });

        $http.get(url.api.qualities, {params: {ordered: 5}}).then(function(response){
            vm.qualityList = response.data;
        });

        $http.get(url.api.countries, {params: {ordered: 5}}).then(function(response){
            vm.countryList = response.data;
        });
    }

    app.controller('MainMenuController', ['$scope', '$http', MainMenuController]);
})();
