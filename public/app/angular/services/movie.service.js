(function(){
    'use strict';

    function movieService($http){

        function qualify(movie, qualification){
            $http.post(url.api.qualifyMovie, {
                movie: movie.id,
                qualification: qualification
            }).then(function(response){
                if(!response.data.success){
                    alert('Something went wrong, try again.');
                }
            });
        }

        function mouseOverStatus(movie){
            var possibleStatus = '';
            if(movie.status == '✘'){
                possibleStatus = '✔';
            } else if(movie.status == '✔'){
                possibleStatus = '✘';
            }
            return possibleStatus;
        }

        function updateStatus(movie){
            $http.post(url.api.updateStatus, {movie: movie.id}).then(function(response){
                var data = response.data;
                if(!data.success){
                    alert(data.message);
                }
            });
        }

        return {
            qualify: qualify,
            mouseOverStatus: mouseOverStatus,
            updateStatus: updateStatus
        }
    }

    movieService.$inject = ['$http'];
    app.service('$movie', movieService);
})();
