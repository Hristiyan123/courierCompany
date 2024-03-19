<?php
require_once "dbh.inc.php";

$query = "SELECT c.*, o.office_name, co.first_name AS courier_first_name, co.last_name AS courier_last_name
          FROM cars c
          JOIN offices o ON c.office_id = o.office_id
          LEFT JOIN couriers co ON c.courier_id = co.courier_id;";

$stmt = $pdo->prepare($query);
$stmt->execute();

$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($cars)) {
    echo "<p>Car not found</p>";
} else {
    echo "<table border='1'>
            <tr>
                <th>Car ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Registration Number</th>
                <th>Fuel Consumption</th>
                <th>Office Name</th>
                <th>Courier</th>
            </tr>";

    foreach ($cars as $car) {
        echo "<tr>
                <td>{$car['car_id']}</td>
                <td>{$car['brand']}</td>
                <td>{$car['model']}</td>
                <td>{$car['registration_number']}</td>
                <td>{$car['fuel_consumption']}</td>
                <td>{$car['office_name']}</td>
                <td>{$car['courier_first_name']} {$car['courier_last_name']}</td>
            </tr>";
    }

    echo "</table>";
}

$pdo = null;
$stmt = null;
?>
