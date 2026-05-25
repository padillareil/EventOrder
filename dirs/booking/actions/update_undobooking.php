<?php
require_once "../../../config/connection.php";
session_start();

$User           = $_SESSION['Uid'];
$DocId          = $_POST['DocId'];

$IPAddress = $_SERVER['REMOTE_ADDR'];/*User Device Ip Address*/
$DeviceName = gethostbyaddr($IPAddress); /*Device host used details*/
$Browser = $_SERVER['HTTP_USER_AGENT']; /*User Browser used*/

try {
    $conn->beginTransaction();

    $upd_booking = $conn->prepare("EXEC dbo.[UndoPencilBooking] ?,?,?,?,?");
    $upd_booking->execute([$User,$DocId,$IPAddress,$DeviceName,$Browser]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    