<?php
require_once "../../../../config/connection.php";

$Functionid     = $_POST['Functionid'];
$FuncRoom    = $_POST['FuncRoom'];
$FloorLevel         = $_POST['FloorLevel'];
$HotelWing         = $_POST['HotelWing'];
$MaxxCapacity    = $_POST['MaxxCapacity'] ?? 0;
$UnitMeasurement         = $_POST['UnitMeasurement'];
$FuncNote         = $_POST['FuncNote'];
$FeeRent = str_replace(',', '', $_POST['FeeRent']);
$Fee = trim($FeeRent);

try {
    $conn->beginTransaction();

    $upd_functionHeader = $conn->prepare("UPDATE HotelRooms SET FunctionName=?,HotelWing=?,FloorLevel=?,MaxCapacity=?,UoM = ?,RentalFee= ?, Notes = ?  WHERE Function_id=?");
    $upd_functionHeader->execute([$FuncRoom,$HotelWing,$FloorLevel,$MaxxCapacity,$UnitMeasurement, $Fee, $FuncNote, $Functionid]);


    $upd_childroom = $conn->prepare("UPDATE RoomChild SET FunctionName=? WHERE Functionid=?");
    $upd_childroom->execute([$FuncRoom, $Functionid]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>




