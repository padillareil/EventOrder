<?php
require_once "../../../../../../config/connection_config.php";

$DocEntry   = $_POST['DocEntry'];
$EventType  =   $_POST['EventType'];
$ServiceType        =   $_POST['ServiceType'];
$Tier       =   $_POST['Tier'];
$Description =  $_POST['Description'];
$MinPax     =   $_POST['MinPax'];
$MaxPax     =   $_POST['MaxPax'];
$AMSnack    =   $_POST['AMSnack'];
$PMSnack    =   $_POST['PMSnack'];
$Lunch      =   $_POST['Lunch'];
$Dinner     =   $_POST['Dinner'];
$Bverage    =   $_POST['Bverage'];


try {
    $conn->beginTransaction();

    
    
    $upd_foodinfo = $conn->prepare("EXEC dbo.[FoodUpdate_info] ?,?,?,?,?,?,?,?,?,?,?,?");
    $upd_foodinfo->execute([$DocEntry,$EventType,$Tier,$Description,$MinPax,$MaxPax,$AMSnack,$PMSnack,$Lunch,$Dinner,$Bverage,$ServiceType]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    