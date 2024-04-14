<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $phone_number = $_POST["phone_number"];
    $pwd = $_POST["pwd"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $office_id = $_POST["office_id"];

    $options = [
        'cost' => 12
    ];
    
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT, $options);

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO couriers (username, phone_number, pwd, first_name, last_name, office_id) VALUES 
        (:username, :phone_number, :pwd, :first_name, :last_name, :office_id);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":phone_number", $phone_number);
        $stmt->bindParam(":pwd", $hashed_password);
        $stmt->bindParam(":first_name", $first_name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":office_id", $office_id);

        $stmt->execute();

        header("Location: ../couriers_login.php");
        exit();
    } catch (\Throwable $th) {
        die("Query failed: " . $th->getMessage());
    }
} else {
    header("Location: ../couriers_registration.php");
    exit();
}