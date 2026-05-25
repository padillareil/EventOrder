<?php
require_once "../../../../config/connection_food.php";

$Description = $_POST['Description'];
$Vendor = $_POST['Vendor'];
$Type = $_POST['Type'];
$Category = $_POST['Category'];
$Quantity = $_POST['Quantity'] ?? 0;
$UnitCost = isset($_POST['UnitCost']) ? trim($_POST['UnitCost']) : 0;
$SellingPrice = isset($_POST['SellingPrice']) ? trim($_POST['SellingPrice']) : 0;


try {

    $conn->beginTransaction();

    /* ✅ 1. Validate Event Name */
    $validate_custom = $conn->prepare("
        SELECT COUNT(LineNum)
        FROM CustomInclusion 
        WHERE CustomDescription = ?
    ");
    $validate_custom->execute([$Description]);

    if ($validate_custom->fetchColumn() > 0) {
        throw new Exception('This custom inclusion already exists.');
    }

    $fetch_inlusioncode = $conn->prepare("EXEC dbo.[CustomInclusionCode]");
    $fetch_inlusioncode->execute();
    $get_inclsioncode = $fetch_inlusioncode->fetch(PDO::FETCH_ASSOC);
    $CustomIncluCode = $get_inclsioncode['CustomIncluCode'];


    $ins_header = $conn->prepare("EXEC dbo.[Create_CustomIclusion] ?,?,?,?,?,?,?,?");
    $ins_header->execute([
        $CustomIncluCode,
        $Vendor,
        $Description,
        $Type,
        $Category,
        $Quantity,
        $UnitCost,
        $SellingPrice
    ]);

    $conn->commit();

    echo "OK"; 
} catch (Exception $e) {

    $conn->rollback();

    echo $e->getMessage();
}
?>

