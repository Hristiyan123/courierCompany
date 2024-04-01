$(document).ready(function(){
    $('#showChangeForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../includes/change_cars.php',
            data: { changeCars: true },
            success: function(response){
                $('.changeCarsContainer').html(response);
            }
        });
    });
});

$(document).ready(function(){
    $(document).on('submit', '#changeCourierForm', function(e){
        e.preventDefault();
        
        let formData = {
            CourierId: $('#changeCourier').val(),
            CarId: $('#changeCar').val(),
            submitChanges: true
        };
        
        $.ajax({
            type: 'POST',
            url: '../includes/change_cars.php',
            data: formData,
            success: function(response){
                alert('Changes submitted successfully.');
            }
        });
    });
});
