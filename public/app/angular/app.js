var app = angular.module('tvkMoviesApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.controller('mainMenuController', function($scope, $http){
    var url = {
        api: {
            genres: document.getElementById('genres_list').dataset.url,
            qualities: document.getElementById('qualitiy_list').dataset.url,
            countries: document.getElementById('country_list').dataset.url
        }
    };

    $http.get(url.api.genres, {params: {ordered: 5}}).then(function(response){
        $scope.genresList = response.data;
    });

    $http.get(url.api.qualities, {params: {ordered: 5}}).then(function(response){
        $scope.qualityList = response.data;
    });

    $http.get(url.api.countries, {params: {ordered: 5}}).then(function(response){
        $scope.countryList = response.data;
    });

});
