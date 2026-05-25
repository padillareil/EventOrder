<?php
require_once "../../../../../../config/connection_config.php";

$DocEntry   = $_POST['DocEntry'];
$DocStatus = $_POST['DocStatus'];

try {
    $conn->beginTransaction();

    $upd_status = $conn->prepare("UPDATE Function_Config SET SpaceStatus=?  WHERE DocEntry=?");
    $upd_status->execute([$DocStatus,$DocEntry]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    