$(function(){
    var url_app = $('#url_app').attr('data-url');

    $.getJSON($('#ul_genres_list').attr('data-url'), function(data){
        var content = '';
        for(var j=0;j<data.length;j++){
            content += '<div class="col-sm-4">';
            content += '<ul class="multi-column-dropdown">';
            for(var k=0;k<data[j].length;k++){
                content += '<li>';
                content += '<a href="#">';
                content += data[j][k].name;
                content += '</a>';
                content += '</li>';
            }
            content += '</ul>';
            content += '</div>';
        }
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
