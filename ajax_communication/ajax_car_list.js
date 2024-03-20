$(document).ready(function(){
    $('#showCarsForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../includes/car_list.php',
            data: $(this).serialize(),
            success: function(response){
                $('#carListContainer').html(response);
            }
        });
    });
});
