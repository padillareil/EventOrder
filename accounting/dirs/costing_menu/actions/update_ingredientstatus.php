<?php
require_once "../../../../config/connection.php";

$DocEntry   = $_POST['DocEntry'];

try {
    $conn->beginTransaction();

    $upd_ingredientstatus = $conn->prepare("EXEC Remove_Ingredient ? ");
    $upd_ingredientstatus->execute([$DocEntry]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    