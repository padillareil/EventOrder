<?php
require_once "../../../config/connection.php";
session_start();

$User  = $_SESSION['Uid'];
$Documentid     = $_POST['Documentid'];
$RatePax = !empty($_POST['RatePax']) ? (float) str_replace(',', '', $_POST['RatePax']) : 0;
$PackageCost = !empty($_POST['PackageCost']) ? (float) str_replace(',', '', $_POST['PackageCost']) : 0;
$Instruction    = !empty($_POST['Instruction']) ? $_POST['Instruction'] : null;

try {
    $conn->beginTransaction();


    $upd_booking = $conn->prepare("EXEC dbo.[ConfirmBooking] ?,?,?,?,?");
    $upd_booking->execute([$User,$Documentid,$RatePax,$PackageCost,$Instruction]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    