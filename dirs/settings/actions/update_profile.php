<?php
require_once "../../../config/connection.php";
session_start();

$User = $_SESSION['Uid'] ?? '';

$IPAddress = $_SERVER['REMOTE_ADDR'];/*User Device Ip Address*/
$DeviceName = gethostbyaddr($IPAddress); /*Device host used details*/
$Browser = $_SERVER['HTTP_USER_AGENT']; /*User Browser used*/


if (empty($User)) {
    echo "Error: Unauthorized session access status.";
    exit;
}

try {
    $conn->beginTransaction();

    if (!isset($_FILES['ProfileImage']) || $_FILES['ProfileImage']['error'] !== 0) {
        throw new Exception("No file uploaded or an unhandled processing error occurred.");
    }

    $allowed = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($_FILES['ProfileImage']['type'], $allowed)) {
        throw new Exception("Invalid file format. Please use only JPG, JPEG, or PNG images.");
    }

    if ($_FILES['ProfileImage']['size'] > 2 * 1024 * 1024) {
        throw new Exception("File footprint calculation exceeds the allowed 2MB limit.");
    }

    $rawImage = file_get_contents($_FILES['ProfileImage']['tmp_name']);
    $base64Image = base64_encode($rawImage);

    $ins = $conn->prepare("EXEC dbo.[UploadProfile] ?,?,?,?,?");
    $ins->execute([$User, $base64Image,$DeviceName, $IPAddress, $Browser]);

    $conn->commit();
    echo "success";

} catch (Exception $e) {
    if ($conn->inTransaction()) {
        $conn->rollBack();
    }
    echo $e->getMessage();
}
?>