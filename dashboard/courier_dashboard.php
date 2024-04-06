<?php
include_once 'C:/xampp/htdocs/courierCompany/includes/config.php';
include_once 'C:/xampp/htdocs/courierCompany/includes/change_cars.php';
include_once 'C:/xampp/htdocs/courierCompany/includes/delete_couriers_from_cars.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../ajax_communication/ajax_car_list.js"></script>
    <script src="../ajax_communication/ajax_change_cars.js"></script>
    <script src="../ajax_communication/ajax_remove_courier.js"></script>
</head>
<body>

<form id="showCarsForm" method="post">
    <button type="submit" name="showCars" id="showCars">Show Cars</button>
</form>

<div id="carListContainer"></div>

<form id="showChangeForm" method="post">
    <button type="submit" name="changeCars">Change</button>
</form>

<div class="changeCarsContainer"></div>

<form id="showDeleteForm" method="post">
    <button type="submit" name="removeFromCar">Remove courier From car</button>
</form>

<div class="deleteCourierFromCar"></div>

<form action="insert_data/inserting.php">
    <button type="submit">Go to Inserting Page</button>
</form>




</body>
</html>
