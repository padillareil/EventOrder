<?php
require_once "../../../../config/connection.php";
session_start();

$User       = $_SESSION['Uid'];
$DocEntry   = $_POST['DocEntry'];
$UnitCost   = $_POST['UnitCost'];

try {
    $conn->beginTransaction();


    $upd_student = $conn->prepare("EXEC Ingredients_update ?,?,?");
    $upd_student->execute([$User,$DocEntry,$UnitCost]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    
