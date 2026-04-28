<?php
require_once "../../../../config/connection.php";

$LineNumber     = $_POST['LineNumber'];
$Room    = $_POST['Room'];
$UnitMeasure         = $_POST['UnitMeasure'];
$MxCapacity    = $_POST['MxCapacity'] ?? 0;
$FeeRental = str_replace(',', '', $_POST['FeeRental']);
$Fee = trim($FeeRental);

try {
    $conn->beginTransaction();

    $upd_roomchild = $conn->prepare("UPDATE RoomChild SET RoomName=?,Uom=?,MaxCapacity=?,RentalFee=? WHERE LineNum=?");
    $upd_roomchild->execute([$Room,$UnitMeasure,$MxCapacity,$Fee, $LineNumber]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>



