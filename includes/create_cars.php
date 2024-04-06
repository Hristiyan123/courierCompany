<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitAddCar'])) {
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $registration_number = $_POST["registration_number"];
    $fuel_consumation = $_POST["fuel_consumation"];
    $office_id = $_POST["office_id"];
    $courier_id = $_POST["courier_id"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO cars (brand, model, registration_number, fuel_consumation, office_id, courier_id) VALUES 
        (:brand, :model, :registration_number, :fuel_consumation, :office_id, :courier_id)";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":brand", $brand);
        $stmt->bindParam(":model", $model);
        $stmt->bindParam(":registration_number", $registration_number);
        $stmt->bindParam(":fuel_consumation", $fuel_consumation);
        $stmt->bindParam(":office_id", $office_id);
        $stmt->bindParam(":courier_id", $courier_id);

        $stmt->execute();

        
        header("Location: inserting.php");
        exit();
    } catch (\Throwable $th) {
        die("Query failed: " . $th->getMessage());
    }
}
?>
