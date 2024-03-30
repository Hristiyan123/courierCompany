<?php
include_once 'C:/xampp/htdocs/courierCompany/includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../ajax_communication/ajax_places_list.js"></script>
</head>
<body>

<form class="searchform" action="" method="post">
    <label for="search">Search for city:</label>
    <input id="search" type="text" name="placeSearch" placeholder="Search for city">
    <button type="submit">Search</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placeSearch = $_POST["placeSearch"];

    try {
        require_once "../includes/dbh.inc.php";

        $query = "SELECT o.*, p.place_name 
          FROM places_offices po
          JOIN offices o ON po.office_id = o.office_id
          JOIN places p ON po.place_id = p.place_id
          WHERE p.place_name LIKE :placeSearch;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":placeSearch", $placeSearch);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

    if (empty($results)) {
        echo "<div>";
        echo "<p>No results</p>";
        echo "</div>";
    } else {
        foreach ($results as $result) {
            echo "<h4>Region: " . htmlspecialchars($result["place_name"]) . "</h4>";
            echo "<h4>Office Name:</h4> <p>" . htmlspecialchars($result["office_name"]) . "</p>";
            echo "<h4>Manager name:</h4> <p>" . htmlspecialchars($result["manager"]) . "</p>";
            echo "<h4>Address:</h4> <p>" . htmlspecialchars($result["address"]) . "</p>";
            echo "<h4>Phone number:</h4> <p>" . htmlspecialchars($result["phone"]) . "</p>";
            echo "<h4>Start of the working day:</h4> <p>" . htmlspecialchars($result["work_start_time"]) . "</p>";
            echo "<h4>End of the working day:</h4> <p>" . htmlspecialchars($result["work_end_time"]) . "</p>";
}
        echo "</div>";
    }
};
?>

</body>
</html>
