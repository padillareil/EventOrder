<?php
require_once "../../../../config/connection_food.php";
session_start();

$PackageCode = $_POST['PackageCode'];
$EventName = $_POST['EventName'];
$Tier = $_POST['Tier'];
$MaxPax = $_POST['MaxPax'];
$MinPax = $_POST['MinPax'];
$Description = $_POST['Description'];
$PackageCategory = $_POST['PackageCategory'];
$PaxAmount = isset($_POST['PaxAmount']) ? trim($_POST['PaxAmount']) : 0;
$FoodCategory = json_decode($_POST['FoodCategory'], true);

if (!is_array($FoodCategory)) {
    throw new Exception("Invalid FoodCategory payload.");
}

try {

    $conn->beginTransaction();

    $upd_header = $conn->prepare("
        EXEC dbo.[UpdateVenuePackage_Header] ?,?,?,?,?,?,?,?
    ");

    $upd_header->execute([
        $PackageCode,
        $EventName,
        $PackageCategory,
        $PaxAmount,
        $MaxPax,
        $Tier,
        $MinPax,
        $Description
    ]);

    $del = $conn->prepare("
        DELETE FROM FoodPackage_Items 
        WHERE FoodPkg_Code = ?
    ");
    $del->execute([$PackageCode]);

    foreach ($FoodCategory as $itemmenu) {
        $Category = $itemmenu['Category'] ?? null;
        $Qty = $itemmenu['Qty'] ?? 1;
        if (!$Category) continue;
        $ins = $conn->prepare("
            INSERT INTO FoodPackage_Items (
                FoodPkg_Code,
                FoodGroup,
                SetupQty
            )
            VALUES (?, ?, ?)
        ");
        $ins->execute([
            $PackageCode,
            $Category,
            $Qty
        ]);
    }

    $conn->commit();

    echo "OK";

} catch (Exception $e) {

    $conn->rollback();

    echo "Error: " . $e->getMessage();
}
?>