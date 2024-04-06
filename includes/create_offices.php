<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitAddOffice'])) {
    $officeId = $_POST["officeId"];
    $officeName = $_POST["officeName"];
    $manager = $_POST["manager"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $workStartTime = $_POST["work_start_time"];
    $workEndTime = $_POST["work_end_time"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO offices (office_id, office_name, manager, address, phone, work_start_time, work_end_time) VALUES 
        (:officeId, :officeName, :manager, :address, :phone, :workStartTime, :workEndTime)";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":officeId", $officeId);
        $stmt->bindParam(":officeName", $officeName);
        $stmt->bindParam(":manager", $manager);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":workStartTime", $workStartTime);
        $stmt->bindParam(":workEndTime", $workEndTime);

        $stmt->execute();

        header("Location: inserting.php");
        exit();
    } catch (\Throwable $th) {
        die("Query failed: " . $th->getMessage());
    }
}
?>
