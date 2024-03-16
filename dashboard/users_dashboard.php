<?php
include_once 'C:/xampp/htdocs/EVROPUT-2000/includes/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placeSearch = $_POST["placeSearch"];

    try {
        require_once "../includes/dbh.inc.php";

        $query = "SELECT o. * , p.place_name 
        FROM offices o
        JOIN places p ON o.place_id = p.place_id
        WHERE p.place_name = :placeSearch;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":placeSearch", $placeSearch);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form class="searchform" action="" method="post">
    <label for="search">Search for city:</label>
    <input id="search" type="text" name="placeSearch" placeholder="Search for city">
    <button>Search</button>

    <?php
    if (empty($results)) {
        echo "<div>";
        echo "<p>No results</p>";
        echo "</div>";
    } else {
        foreach ($results as $result) {
            echo "<h4>" . htmlspecialchars($result["place_name"]) . "</h4>";
            echo "<p>" . htmlspecialchars($result["office_name"]) . "</p>";
            echo "<p>" . htmlspecialchars($result["manager"]) . "</p>";
            echo "<p>" . htmlspecialchars($result["address"]) . "</p>";
            echo "<p>" . htmlspecialchars($result["phone"]) . "</p>";
            echo "<p>" . htmlspecialchars($result["working_hours"]) . "</p>";
        }
        echo "</div>";
    };
    ?>
</body>
</html>

