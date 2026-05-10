<?php
require_once "../../../../../../config/connection_config.php";

$DocEntry   = $_POST['DocEntry'];
$Property   = $_POST['Property'];
$Tier   = $_POST['Tier'];
$Functionroom   = $_POST['Functionroom'];
$WingFloor   = $_POST['WingFloor'];
$HotelAddress = $_POST['HotelAddress'];
$VenueType = $_POST['VenueType'];
$RentalFee = str_replace(',', '', $_POST['RentalFee']);
$Fee = trim($RentalFee);
$PaxCapacity = $_POST['PaxCapacity'];
$ChairCapacity = $_POST['ChairCapacity'];
$TableCapacity = $_POST['TableCapacity'];
$Roomsize = $_POST['Roomsize'];

try {
    $conn->beginTransaction();

    $upd_functioninfo = $conn->prepare("EXEC dbo.[FunctionUpdate_info] ?,?,?,?,?,?,?,?,?,?,?,?");
    $upd_functioninfo->execute([$DocEntry,$Property,$Tier,$Functionroom,$WingFloor,$HotelAddress,$VenueType,$Fee,$PaxCapacity,$ChairCapacity,$TableCapacity,$Roomsize]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    