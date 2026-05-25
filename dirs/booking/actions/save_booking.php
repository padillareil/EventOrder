<?php
require_once "../../../config/connection_booking.php";
session_start();

$User 			= $_SESSION['Uid'];
$Guest 			= $_POST['Guest'];
$Position 		= $_POST['Position'];
$Company 		= $_POST['Company'];
$MobileNumber 	= $_POST['MobileNumber'];
$Email 			= $_POST['Email'];
$Address 		= $_POST['Address'];
$Otherinfo 		= $_POST['Otherinfo'];
$Title 			= $_POST['Title'];
$DateStart 		= $_POST['DateStart'];
$DateEnd 		= $_POST['DateEnd'];
$Category		= $_POST['Category'];

$IPAddress = $_SERVER['REMOTE_ADDR'];/*User Device Ip Address*/
$DeviceName = gethostbyaddr($IPAddress); /*Device host used details*/
$Browser = $_SERVER['HTTP_USER_AGENT']; /*User Browser used*/


try {

	$conn->beginTransaction();

	$ins_booking = $conn->prepare("EXEC dbo.[PencilBooking] ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?");

	$ins_booking->execute([
		$User,
		$Guest,
		$Position,
		$Company,
		$MobileNumber,
		$Address,
		$Email,
		$Otherinfo,
		$Title,
		$DateStart,
		$DateEnd,
		$Category,
		$DeviceName,
		$IPAddress,
		$Browser
	]);

	$conn->commit();

	echo "OK";

} catch(PDOException $e) {

	if ($conn->inTransaction()) {
		$conn->rollBack();
	}

	echo "<b>Warning. Please Contact System Developer.<br/></b>" . $e->getMessage();
}
?>