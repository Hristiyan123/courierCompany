<?php
include_once 'C:/xampp/htdocs/EVROPUT-2000/includes/config.php';
include_once 'C:/xampp/htdocs/EVROPUT-2000/includes/change_cars.php';
include_once 'C:/xampp/htdocs/EVROPUT-2000/includes/delete_couriers_from_cars.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../ajax_communication/ajax_car_list.js"></script>
</head>
<body>

<form id="showCarsForm" method="post">
    <button type="submit" name="showCars" id="showCars">Show Cars</button>
</form>

<div id="carListContainer"></div>

<form method="post">
    <button type="submit" name="changeCars">Change</button>
</form>

<form action="" method="post">
            <button type="submit" name="removeFromCar">Remove courier From car</button>
</form>';

<?php
if (isset($_POST['changeCars'])) {
    echo '<form class="searchform" method="post">
        <label for="changeCourier">Insert courier id:</label>
        <input id="changeCourier" type="text" name="CourierId" placeholder="Courier">
        <p>To</p>
        <label for="changeCar">Car id:</label>
        <input id="changeCar" type="text" name="CarId" placeholder="Car">
        <button type="submit" name="submitChanges" id="submitChanges">Submit</button>
    </form>';
};

if (isset($_POST['removeFromCar'])) {
    echo '<form class="searchform" action="" method="post">
    <label for="removeCourierFromCar">Remove courier from car id:</label>
    <input id="removeCourierFromCar" type="text" name="carId" placeholder="car id:">
    <button type="submit" name="submitRemove">Submit</button>
    </form>';
};
?>

</body>
</html>
