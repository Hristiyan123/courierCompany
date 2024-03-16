<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";

        $query = "SELECT * FROM couriers WHERE username = :username AND pwd = :pwd;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: ../dashboard/courier_dashboard.php");
            exit();
        } else {
 
            header("Location: ../couriers_login_formhandler.inc.php");
            exit();
        }

    } catch (\Throwable $th) {
        die("Query failed: " . $th->getMessage());
    }
} else {
    header("Location: ../couriers_login_formhandler.inc.php");
    exit();
}
?>
