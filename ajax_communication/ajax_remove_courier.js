$(document).ready(function(){
    $('#showDeleteForm button').click(function(e){
        e.preventDefault(); 

        $.ajax({
            type: 'POST',
            url: '../includes/delete_couriers_from_cars.php',
            data: { removeFromCar: true },
            success: function(response){
                $('.deleteCourierFromCar').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error); 
            }
        });
    });
});
