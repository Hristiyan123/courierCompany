<?php
if (isset($_POST['submitChanges'])) {

    if (isset($_POST['CourierId'], $_POST['CarId'])) {

        $courierId = $_POST['CourierId'];
        $carId = $_POST['CarId'];

        try {
            require_once "dbh.inc.php";

            $query = "UPDATE cars SET courier_id = :courierId WHERE car_id = :carId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':courierId', $courierId, PDO::PARAM_INT);
            $stmt->bindParam(':carId', $carId, PDO::PARAM_INT);
            $stmt->execute();

            echo "Courier for car with ID {$carId} changed to courier with ID {$courierId}";

            $pdo = null;
            $stmt = null;

        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        echo "Please enter both courier ID and car ID.";
    }
};
