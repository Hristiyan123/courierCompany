<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";

        $user_cookie = 'user_cookie';
        session_name($user_cookie);

        $query = "SELECT * FROM users WHERE username = :username AND pwd = :pwd;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            include_once 'config.php';
            
            header("Location: ../dashboard/users_dashboard.php");
            exit();
        } else {
            header("Location: ..user_login.php");
            exit();
        }

    } catch (\Throwable $th) {
        die("Query failed: " . $th->getMessage());
    }
} else {
    header("Location: ../users_login.php");
    exit();
}
