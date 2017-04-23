$(function(){
    var url_app = $('#url_app').attr('data-url');

    $(document).on('click', '#star_to_movie', function(e){
        e.preventDefault();
        var movie_id = $(this).attr('data-id');
        var qualification = $(this).attr('data-qualification');

        var url = url_app + '/qualify-movie/' + movie_id + '/' + qualification;
        var star_to_movie_son = $('> i', this);
        var star_to_movie_siblings = $(this).parent().siblings();

        $.get(url, function(data){
            star_to_movie_son.attr('class', 'fa fa-star');
            $.each(star_to_movie_siblings, function(index, value){
                var a = $('> a', value);
                var i = $('> i', a);
                if(a.attr('data-qualification') <= qualification){
                    i.attr('class', 'fa fa-star');
                } else {
                    i.attr('class', 'fa fa-star-o');
                }
            });
        });

    });

    $(document).on('mouseover', '#update_movie_status', function(){
        var current_status = $(this).attr('data-current-status');

        var possible_status = '';

        if(current_status == '✘'){
            possible_status = '✔';
        } else if(current_status == '✔'){
            possible_status = '✘';
        }

        $(this).children('p').html(possible_status);
    });

    $(document).on('mouseleave', '#update_movie_status', function(){
        var current_status = $(this).attr('data-current-status');
        $(this).children('p').html(current_status);
    });

    $(document).on('click', '#update_movie_status', function(){
        var url = $('#url_movie_list_update_status').attr('data-url');
        var current_status = $(this).attr('data-current-status');
        $.post(url, {'status': current_status, 'movie_id': $(this).attr('data-movie-id')}, function(movie){
            var new_status = movie.seen == 1 ? '✔' : '✘';

            $(this).children('p').html(new_status);
        });
    });

});
