<?php
require_once "../../../../config/connection_food.php";

$Custid        = $_POST['Custid'];
$Category       = $_POST['Category'];
$DishName       = $_POST['DishName'];
$Description    = $_POST['Description'];
$Ingredients    = $_POST['Ingredients'];

try {
    $conn->beginTransaction();


    $upd_menu = $conn->prepare("UPDATE CustomMenu SET CustomMenuName=?,FoodGroup = ?, Description=?,Ingredients=? WHERE Custom_id=?");
    $upd_menu->execute([$DishName,$Category, $Description,$Ingredients,$Custid]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    