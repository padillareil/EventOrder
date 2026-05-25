<?php
require_once "../../../config/connection.php";
require_once "../../../config/functions.php";
session_start();

$User       = $_SESSION['Uid'];
$ConfirmPassword   = hash_password($_POST['ConfirmPassword']);
$Location = $_POST['Location'];
$IPAddress = $_SERVER['REMOTE_ADDR'];/*User Device Ip Address*/
$DeviceName = gethostbyaddr($IPAddress); /*Device host used details*/
$Browser = $_SERVER['HTTP_USER_AGENT']; /*User Browser used*/

try {

    $conn->beginTransaction();

    $upd_password = $conn->prepare("
        EXEC dbo.[AccountSecurity_update] ?,?,?,?,?,?
    ");

    $upd_password->execute([
        $User,
        $ConfirmPassword,
        $DeviceName,
        $IPAddress,
        $Browser,
        $Location
    ]);

    $conn->commit();

    echo "success";

} catch (PDOException $e) {

    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>