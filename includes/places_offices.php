<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $place_id = $_POST["place_id"];
    $office_id = $_POST["office_id"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO places_offices (place_id, office_id) VALUES (:place_id, :office_id)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":place_id", $place_id);
        $stmt->bindParam(":office_id", $office_id);
        $stmt->execute();

    } catch (\Throwable $th) {
        die  ($th->getMessage());
    }
}
?>