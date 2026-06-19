<?php
require_once "../../../../config/connection.php";

$LatestDocId   = $_POST['LatestDocId'];

try {
    $conn->beginTransaction();

    
    $upd_notifyme = $conn->prepare("EXEC NotifyMe_Update ?");
    $upd_notifyme->execute([$LatestDocId]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    