<?php
require_once "../../../../config/connection_food.php";

$LineNum        = $_POST['LineNum'];
$DishName       = $_POST['DishName'];
$Description    = $_POST['Description'];
$Ingredients    = $_POST['Ingredients'];

try {
    $conn->beginTransaction();


    $upd_menu = $conn->prepare("UPDATE FoodDish SET DishName=?,Description=?,Ingredients=? WHERE LineNum=?");
    $upd_menu->execute([$DishName,$Description,$Ingredients,$LineNum]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    