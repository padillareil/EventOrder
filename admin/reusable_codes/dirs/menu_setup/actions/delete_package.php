<?php
require_once "../../../../config/connection_food.php";

$DocEntry = $_POST['DocEntry'];

try {

    $conn->beginTransaction();

    $fetch_package = $conn->prepare("
        SELECT FoodPkg_Code
        FROM FoodPackage_Header 
        WHERE DocEntry = ?
    ");
    $fetch_package->execute([$DocEntry]);
    $get_pckgcode = $fetch_package->fetch(PDO::FETCH_ASSOC);

    if (!$get_pckgcode) {
        throw new Exception("Package not found.");
    }

    $PackageNumber = $get_pckgcode['FoodPkg_Code'];

    $del_food = $conn->prepare("
        DELETE FROM FoodPackage_Items 
        WHERE FoodPkg_Code = ?
    ");
    $del_food->execute([$PackageNumber]);

    $del_header = $conn->prepare("
        DELETE FROM FoodPackage_Header 
        WHERE DocEntry = ?
    ");
    $del_header->execute([$DocEntry]);

    $conn->commit();

    echo "success";

} catch (Exception $e) {

    $conn->rollback();

    echo $e->getMessage();
}
?>