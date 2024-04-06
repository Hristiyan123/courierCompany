<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitAddRegion'])) {
    $place_id = $_POST["place_id"];
    $placeName = $_POST["placeName"];
    $region = $_POST["region"];
    $zipCode = $_POST["zipCode"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO places (place_id, place_name, region, zip_code) VALUES 
        (:place_id, :placeName, :region, :zipCode)";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":place_id", $place_id);
        $stmt->bindParam(":placeName", $placeName);
        $stmt->bindParam(":region", $region);
        $stmt->bindParam(":zipCode", $zipCode);

        $stmt->execute();

        header("Location: inserting.php");
        exit();
    } catch (\Throwable $th) {
        die("Query failed: " . $th->getMessage());
    }
}
?>
