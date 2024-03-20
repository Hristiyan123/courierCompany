$(document).ready(function(){
    $('.searchform').submit(function(e){
        e.preventDefault();
        var placeSearch = $('#search').val(); 
        $.ajax({
            type: 'POST',
            url: '../dashboard/users_dashboard.php', 
            data: {placeSearch: placeSearch},
            success: function(response){
                $('body').html(response);
            }
        });
    });
});