<?php
require_once "../../../../config/connection_food.php";

$EventName = strtoupper($_POST['EventName']);
$Category = $_POST['Category'];

$Tier = $_POST['Tier'];
$MaxPax = $_POST['MaxPax'];
$MinPax = $_POST['MinPax'];
$Description = $_POST['Description'];


$PaxAmount = isset($_POST['PaxAmount']) ? trim($_POST['PaxAmount']) : 0;
$FoodCategory = isset($_POST['FoodCategory']) 
    ? json_decode($_POST['FoodCategory'], true) 
    : [];

try {

    $conn->beginTransaction();

    /* ✅ 1. Validate Event Name */
    $validate_eventname = $conn->prepare("
        SELECT COUNT(DocEntry)
        FROM FoodPackage_Header 
        WHERE PackageName = ?
    ");
    $validate_eventname->execute([$EventName]);

    if ($validate_eventname->fetchColumn() > 0) {
        throw new Exception('This event already exists.');
    }

    $fetch_pkgnum = $conn->prepare("EXEC dbo.[PackageCode]");
    $fetch_pkgnum->execute();
    $get_pkgnum = $fetch_pkgnum->fetch(PDO::FETCH_ASSOC);
    $PKGNumber = $get_pkgnum['PKGNumber'];


    $ins_header = $conn->prepare("EXEC dbo.[Create_Package] ?,?,?,?,?,?,?,?");
    $ins_header->execute([
        $EventName,
        $PKGNumber,
        $Category,
        $PaxAmount,
        $Tier,
        $MaxPax,
        $MinPax,
        $Description
    ]);


    if (!empty($FoodCategory)) {

        foreach ($FoodCategory as $itemmenu) {

            $Mid = $itemmenu['Mid'];
            $Qty = isset($itemmenu['Quantity']) ? $itemmenu['Quantity'] : 1;

            $ins_foods = $conn->prepare("EXEC dbo.[Create_PackageMenu] ?,?,?");
            $ins_foods->execute([
                $Mid,
                $PKGNumber,
                $Qty
            ]);
        }
    }

    $conn->commit();

    echo "OK"; 
} catch (Exception $e) {

    $conn->rollback();

    echo $e->getMessage();
}
?>