<?php
require_once "../../../config/connection.php";
session_start();


$User           = $_SESSION['Uid'];
$DocId          = $_POST['DocId'];
$Guest          = $_POST['Guest'];
$Position       = $_POST['Position'];
$Company        = $_POST['Company'];
$MobileNumber   = $_POST['MobileNumber'];
$Email          = $_POST['Email'];
$Address        = $_POST['Address'];
$Title          = $_POST['Title'];
$DateStart      = $_POST['DateStart'];
$DateEnd        = $_POST['DateEnd'];
$Category       = $_POST['Category'];

$StartTime       = $_POST['StartTime'];
$EndTime       = $_POST['EndTime'];
$ExpectedPax       = $_POST['ExpectedPax'];
$GuaranteedPax       = $_POST['GuaranteedPax'];

$IPAddress = $_SERVER['REMOTE_ADDR'];/*User Device Ip Address*/
$DeviceName = gethostbyaddr($IPAddress); /*Device host used details*/
$Browser = $_SERVER['HTTP_USER_AGENT']; /*User Browser used*/

try {
    $conn->beginTransaction();

    $upd_booking = $conn->prepare("EXEC dbo.[ModifyBooking] ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?");
    $upd_booking->execute([$User,$DocId,$Guest,$Position,$Company,$MobileNumber,$Email,$Address,$Title,$DateStart,$DateEnd,$Category,$StartTime, $EndTime, $ExpectedPax, $GuaranteedPax, $IPAddress,$DeviceName,$Browser]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    