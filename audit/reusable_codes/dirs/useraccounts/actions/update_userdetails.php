<?php
require_once "../../../../config/connection.php";

$Uid   = $_POST['Uid'];
$Fullname = $_POST['Fullname'];
$Position     = $_POST['Position'];

try {
    $conn->beginTransaction();

    $upd_user = $conn->prepare("UPDATE SysAccount SET Fullname=?,Position=? WHERE Uid=?");
    $upd_user->execute([$Fullname,$Position,$Uid]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    