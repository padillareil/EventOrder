<?php
require_once "../../../../config/connection_food.php";

$LineNum        = $_POST['LineNum'];
$Description    = $_POST['Description'];
$Vendor         = $_POST['Vendor'];
$Type           = $_POST['Type'];
$Category       = $_POST['Category'];
$Quantity       = $_POST['Quantity']?? 0;
$UnitCost       = $_POST['UnitCost'] ?? 0;
$SellingPrice   = $_POST['SellingPrice'] ?? 0;

try {
    $conn->beginTransaction();


    $upd_inclusion = $conn->prepare("UPDATE CustomInclusion SET CustomDescription=?,Vendor=?,Category=?,InclusionType=?,Quantity=?,UnitCost=?,SellingPrice=? WHERE LineNum=?");
    $upd_inclusion->execute([$Description,$Vendor,$Category,$Type,$Quantity,$UnitCost,$SellingPrice, $LineNum]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    
