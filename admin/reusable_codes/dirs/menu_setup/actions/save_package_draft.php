<?php
require_once "../../../../config/connection.php";
session_start();

$User = $_SESSION['Aid'];

$EventName = $_POST['EventName'];
$EngagerCategory = $_POST['EngagerCategory'];
$PaxAmount = isset($_POST['PaxAmount']) ? trim($_POST['PaxAmount']) : 0;
$Inclusion = $_POST['Inclusion'];
$PaymentArrangement = $_POST['PaymentArrangement'];
$Note = $_POST['Note'];
$Menus = $_POST['Menus'] ?? [];

try {

    $draftData = [
        "UserId" => $User,
        "EventName" => $EventName,
        "EngagerCategory" => $EngagerCategory,
        "PaxAmount" => $PaxAmount,
        "Inclusion" => $Inclusion,
        "PaymentArrangement" => $PaymentArrangement,
        "Note" => $Note,
        "Menus" => $Menus,
        "CreatedAt" => date("Y-m-d H:i:s")
    ];

    $baseDir = "../package_drafts/";
    $userDir = $baseDir . $User . "/";

    if (!file_exists($baseDir)) {
        mkdir($baseDir, 0777, true);
    }

    if (!file_exists($userDir)) {
        mkdir($userDir, 0777, true);
    }

    $fileName = "draft_" . time() . ".json";
    $filePath = $userDir . $fileName;

    file_put_contents($filePath, json_encode($draftData, JSON_PRETTY_PRINT));

    echo "OK";

} catch (Exception $e) {
    echo "Error saving draft: " . $e->getMessage();
}
?>