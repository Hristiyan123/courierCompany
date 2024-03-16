<?php
if (isset($_POST['submitRemove'])) {

    if (isset($_POST['carId'])) {

        $carId = $_POST['carId'];

        try {
            require_once "dbh.inc.php";

            $query = "SELECT courier_id FROM cars WHERE car_id = :carId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':carId', $carId, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $currentCourierId = $result['courier_id'];

            $query = "UPDATE cars SET last_used_courier_id = :currentCourierId WHERE car_id = :carId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':currentCourierId', $currentCourierId, PDO::PARAM_INT);
            $stmt->bindParam(':carId', $carId, PDO::PARAM_INT);
            $stmt->execute();

            $query = "UPDATE cars SET courier_id = NULL WHERE car_id = :carId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':carId', $carId, PDO::PARAM_INT);
            $stmt->execute();

            echo "Courier removed from car with ID {$carId}. Last used courier ID saved: {$currentCourierId}";

            $pdo = null;
            $stmt = null;

        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        echo "Please enter car ID.";
    }
}
?>
