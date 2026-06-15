<?php
require_once "../../../config/connection.php";
session_start();

if (!isset($_SESSION['Uid'])) {
    exit("Session expired. Please login again.");
}

$User               = $_SESSION['Uid'];
$EventTitle         = $_POST['EventTitle'] ?? '';
$StartDate          = !empty($_POST['StartDate']) ? $_POST['StartDate'] : null;
$EndDate            = !empty($_POST['EndDate']) ? $_POST['EndDate'] : null;
$StartTime          = $_POST['StartTime'] ?? null;
$EndTime            = $_POST['EndTime'] ?? null;
$Hotel              = $_POST['Hotel'] ?? '';
$Functions          = $_POST['Functions'] ?? '';
$ExpectedPax        = $_POST['ExpectedPax'] ?? '';
$GuaranteedPax      = $_POST['GuaranteedPax'] ?? '';
$EngagerCategory    = $_POST['EngagerCategory'] ?? '';
$GuestName          = $_POST['GuestName'] ?? '';
$JobPosition        = $_POST['JobPosition'] ?? '';
$Company            = $_POST['Company'] ?? '';
$MobileNumber       = $_POST['MobileNumber'] ?? '';
$MobileNumber2       = $_POST['MobileNumber2'] ?? '';
$MobileNumber3       = $_POST['MobileNumber3'] ?? '';
$Email              = $_POST['Email'] ?? '';
$CompanyAddress     = $_POST['CompanyAddress'] ?? '';
$DraftId            = $_POST['DraftId'] ?? ' ';

try {

    $conn->beginTransaction();

    $stmt = $conn->prepare("
        EXEC dbo.[PencilBooking_Draft]
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?
    ");

    $stmt->execute([
        $User,
        $EventTitle,
        $StartDate,
        $EndDate,
        $StartTime,
        $EndTime,
        $Hotel,
        $Functions,
        $ExpectedPax,
        $GuaranteedPax,
        $EngagerCategory,
        $GuestName,
        $Company,
        $MobileNumber,
        $MobileNumber2,
        $MobileNumber3,
        $Email,
        $CompanyAddress,
        $JobPosition,
        $DraftId

    ]);

    $conn->commit();

    echo "OK";

} catch (PDOException $e) {

    if ($conn->inTransaction()) {
        $conn->rollBack();
    }

    echo "<b>Warning. Please Contact System Developer.</b><br>";
    echo $e->getMessage();
}
?>