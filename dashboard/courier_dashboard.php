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
</head>
<body>

<form action="" method="post">
    <button type="submit" name="showCars">Show Cars</button>
</form>

<?php

if (isset($_POST['showCars'])) {
    echo '<form action="" method="post">
            <button type="submit" name="changeCars">Change</button>
          </form>';

    echo  '<form action="" method="post">
            <button type="submit" name="removeFromCar">Remove courier From car</button>
          </form>';

    include_once 'C:/xampp/htdocs/EVROPUT-2000/includes/car_list.php';
};

if (isset($_POST['changeCars'])) {
    echo '<form class="searchform" action="" method="post">
    <label for="changeCourier">insert courier id:</label>
    <input id="changeCourier" type="text" name="CourierId" placeholder="Courier">
    <P> to </P
    <label for="changeCar">car id:</label>
    <input id="changeCar" type="text" name="CarId" placeholder="Car">
    <button type="submit" name="submitChanges">Submit</button>
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
