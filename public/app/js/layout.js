$(function(){
    
    $.getJSON($('#ul_genres_list').attr('data-url'), function(data){
        var html = '';
        $.each(data, function(key, value){
            html += '<li><a href="#">' + value.name +'</a></li>';
        });
        $('#ul_genres_list').html(html);
    });
    
});