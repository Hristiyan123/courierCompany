<?php
require_once "dbh.inc.php";

$query = "SELECT c.*, o.office_name, co.first_name AS courier_first_name, co.last_name AS courier_last_name,
                  co2.first_name AS last_used_courier_first_name, co2.last_name AS last_used_courier_last_name
          FROM cars c
          JOIN offices o ON c.office_id = o.office_id
          LEFT JOIN couriers co ON c.courier_id = co.courier_id
          LEFT JOIN couriers co2 ON c.last_used_courier_id = co2.courier_id;";

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
                <th>Fuel Consumation</th>
                <th>Office Name</th>
                <th>Courier</th>
                <th>Last used by</th>
            </tr>";

    foreach ($cars as $car) {
        echo "<tr>
            <td>" . htmlspecialchars($car['car_id']) . "</td>
            <td>" . htmlspecialchars($car['brand']) . "</td>
            <td>" . htmlspecialchars($car['model']) . "</td>
            <td>" . htmlspecialchars($car['registration_number']) . "</td>
            <td>" . htmlspecialchars($car['fuel_consumation']) . "</td>
            <td>" . htmlspecialchars($car['office_name']) . "</td>
            <td>" . htmlspecialchars($car['courier_first_name']) . " " . htmlspecialchars($car['courier_last_name']) . "</td>
            <td>" . htmlspecialchars($car['last_used_courier_first_name']) . " " . htmlspecialchars($car['last_used_courier_id']) . "</td>
            </tr>";
    }

    echo "</table>";
}

$pdo = null;
$stmt = null;
?>
