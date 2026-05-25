<?php
require_once "../../../../config/connection.php";

$Uid   = $_POST['Uid'];
$Status = $_POST['Status'];

try {
    $conn->beginTransaction();

    $upd_access = $conn->prepare("UPDATE SysAccount SET SysAccess =? WHERE Uid=?");
    $upd_access->execute([$Status,$Uid]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    