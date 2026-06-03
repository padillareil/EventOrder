<?php
require_once "../../../config/connection.php";
session_start();

$User = $_SESSION['Uid'];
$DocId   = $_POST['DocId'];
$IPAddress  = $_SERVER['REMOTE_ADDR'];
$DeviceName = gethostbyaddr($IPAddress);
$Browser    = $_SERVER['HTTP_USER_AGENT'];

try {
    $conn->beginTransaction();

    $upd_deletestatus = $conn->prepare("EXEC dbo.[DocumentDelete_Draft] ?,?,?,?,?");
    $upd_deletestatus->execute([$User, $DocId, $DeviceName, $IPAddress, $Browser]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    