<?php
require_once "../../../../config/connection.php";

$DocId   = $_POST['DocId'];

try {
    $conn->beginTransaction();

    
    $upd_notifyme = $conn->prepare("EXEC NotifyMe_Update ?");
    $upd_notifyme->execute([$DocId]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    