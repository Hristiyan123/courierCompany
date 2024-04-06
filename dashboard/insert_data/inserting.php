<?php 

include_once 'C:/xampp/htdocs/courierCompany/includes/config.php';
include_once 'C:/xampp/htdocs/courierCompany/includes/create_cars.php';
include_once 'C:/xampp/htdocs/courierCompany/includes/create_offices.php';
include_once 'C:/xampp/htdocs/courierCompany/includes/create_places.php';
include_once 'C:/xampp/htdocs/courierCompany/includes/places_offices.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form class="searchform" method="post">
    <p>Registrate a car:</p>
    <label for="brand">Brand:</label><br>
    <input id="brand" type="text" name="brand"><br>

    <label for="model">Model:</label><br>
    <input id="model" type="text" name="model"><br>

    <label for="registration_number">Registration Number:</label><br>
    <input id="registration_number" type="text" name="registration_number"><br>

    <label for="fuel_consumation">Fuel Consumption:</label><br>
    <input id="fuel_consumation" type="text" name="fuel_consumation"><br>

    <label for="office_id">Office ID:</label><br>
    <input id="office_id" type="text" name="office_id"><br>

    <label for="courier_id">Courier ID:</label><br>
    <input id="courier_id" type="text" name="courier_id"><br>

    <button type="submit" name="submitAddCar">Submit</button>
</form>

<form class="searchform" method="post">
    <p>Registrate a office:</p>
    <label for="officeId">office id:</label><br>
    <input id="officeId" type="text" name="officeId"><br>

    <label for="officeName">Name:</label><br>
    <input id="officeName" type="text" name="officeName"><br>

    <label for="manager">Name of the manager:</label><br>
    <input id="manager" type="text" name="manager"><br>

    <label for="address">adress:</label><br>
    <input id="address" type="text" name="address"><br>

    <label for="phone">phone number:</label><br>
    <input id="phone" type="text" name="phone"><br>

    <label for="work_start_time">open at:</label><br>
    <input id="work_start_time" type="text" name="work_start_time"><br>

    <label for="work_end_time">closed at:</label><br>
    <input id="work_end_time" type="text" name="work_end_time"><br>


    <button type="submit" name="submitAddOffice">Submit</button>
</form>

<form class="searchform" method="post">
    <p>Register a new region:</p>

    <label for="place_id">place id:</label><br>
    <input id="place_id" type="text" name="place_id"><br>

    <label for="placeName">Place Name:</label><br>
    <input id="placeName" type="text" name="placeName"><br>

    <label for="region">Region:</label><br>
    <input id="region" type="text" name="region"><br>

    <label for="zipCode">ZIP Code:</label><br>
    <input id="zipCode" type="text" name="zipCode"><br>

    <button type="submit" name="submitAddRegion">Submit</button>
</form>

<p>set office to any place<p>
    <form method="post">
        <label for="place_id">place id:</label><br>
        <input id="place_id" name="place_id"><br>

        <label for="office_id">office id:</label><br>
        <input id="office_id" name="office_id"><br>

        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html>
