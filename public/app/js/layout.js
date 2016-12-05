$(function(){
    
    $.getJSON($('#ul_genres_list').attr('data-url'), function(data){
        var content = '';
        $.each(data, function(key, value){
            content += '<li><a href="#">' + value.name +'</a></li>';
        });
        $('#ul_genres_list').html(content);
    });
    
});