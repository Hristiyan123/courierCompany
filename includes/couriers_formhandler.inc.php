<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $phone_number = $_POST["phone_number"];
    $pwd = $_POST["pwd"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO couriers (username, phone_number, pwd, first_name, last_name) VALUES 
        (:username, :phone_number, :pwd, :first_name, :last_name);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":phone_number", $phone_number);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam(":first_name", $first_name);
        $stmt->bindParam(":last_name", $last_name);

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