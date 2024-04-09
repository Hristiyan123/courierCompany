<?php
if (isset($_POST['changeCars'])) {
    echo '<form id="changeCourierForm" class="searchform" method="post">   
        <label for="changeCourier">Insert courier id:</label>
        <input id="changeCourier" type="text" name="CourierId" placeholder="Courier">
        <p>To</p>
        <label for="changeCar">Car id:</label>
        <input id="changeCar" type="text" name="CarId" placeholder="Car">
        <button type="submit" name="submitChanges" id="submitChanges">Submit</button>
    </form>';
};

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


            $pdo = null;
            $stmt = null;

        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        echo "Please enter both courier ID and car ID.";
    }
};
?>
