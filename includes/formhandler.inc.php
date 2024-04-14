<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    //hashing pwd

    $options = [
        'cost' => 12
    ];

    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT, $options);

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, pwd, email) VALUES 
        (:username, :pwd, :email);";

        $stmt = $pdo->prepare($query);

        // bindParam params with user input
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashed_password);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../users_login.php");
        die(); 
    } catch (\Throwable $th) {
        die("Query failed: " . $th->getMessage());
    }
}
else {
    header("Location: ../index.php");
}

