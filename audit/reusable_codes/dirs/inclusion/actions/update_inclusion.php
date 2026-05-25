<?php
require_once "../../../../config/connection_food.php";

$LineNum        = $_POST['LineNum'];
$Description    = $_POST['Description'];
$Type           = $_POST['Type'];
$Category       = $_POST['Category'];
$Quantity       = $_POST['Quantity']?? 0;
$Price          = $_POST['Price'] ?? 0;

try {
    $conn->beginTransaction();


    $upd_inclusion = $conn->prepare("UPDATE EventInclusion SET InclusionType=?,Category=?,InclusionPrice=?,InclusionDescription=?,Quantity=? WHERE LineNum=?");
    $upd_inclusion->execute([$Type,$Category,$Price,$Description,$Quantity, $LineNum]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    