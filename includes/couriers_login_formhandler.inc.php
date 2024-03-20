<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        $user_cookie = 'user_cookie';
        session_name($user_cookie);

        $query = "SELECT * FROM couriers ORDER BY username;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $couriers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = binarySearch($couriers, $username, 'username');

        if ($result !== false && $couriers[$result]['pwd'] === $pwd) {
            header("Location: ../dashboard/courier_dashboard.php");
            exit();
        } else {
            header("Location: ../couriers_login.php");
            exit();
        }

    } catch (\Throwable $th) {
        die("Query failed: " . $th->getMessage());
    }
} else {
    header("Location: ../couriers_login.php");
    exit();
};

function binarySearch($arr, $searchValue, $key) {
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);
        
        if ($arr[$mid][$key] == $searchValue) {
            return $mid;
        }

        if ($arr[$mid][$key] < $searchValue) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return false;
};
