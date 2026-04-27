<?php
require_once "../../../../config/connection.php";

$Vid        = $_POST['Vid'];
$Description    = $_POST['Description'];
$Category         = $_POST['Category'];
$Rental           = $_POST['Rental'] ?? 0;
$Corkage       = $_POST['Corkage'] ?? 0;
$Note       = $_POST['Note']?? ' ';

try {
    $conn->beginTransaction();


    $upd_inclusion = $conn->prepare("UPDATE VenuePolicy SET ItemDescription=?,ItemCategory=?,RentalFee=?,CorkageFee=?,Notes=? WHERE Vid=?");
    $upd_inclusion->execute([$Description,$Category,$Rental,$Corkage,$Note, $Vid]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>

