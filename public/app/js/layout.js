$(function(){
    var url_app = $('#url_app').attr('data-url');

    $.getJSON($('#ul_genres_list').attr('data-url'), function(data){
        var content = '';
        $.each(data, function(key, value){
            content += '<li><a href="#">' + value.name +'</a></li>';
        });
        $('#ul_genres_list').html(content);
    });

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

});