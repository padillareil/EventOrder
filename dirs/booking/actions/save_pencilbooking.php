<?php

require_once "../../../config/connection.php";
session_start();

function cleanNumber($value) {
    return floatval(str_replace(',', '', $value));
}

$User = $_SESSION['Uid'];

$EventTitle      = strtoupper($_POST['EventTitle'] ?? '');
$BlockingFee     = cleanNumber($_POST['BlockingFee'] ?? 0);
$StartDate       = $_POST['StartDate'] ?? '';
$EndDate         = $_POST['EndDate'] ?? '';
$StartTime       = $_POST['StartTime'] ?? '';
$EndTime         = $_POST['EndTime'] ?? '';
$Hotel           = $_POST['Hotel'] ?? '';
$Functions       = $_POST['Functions'] ?? '';
$ExpectedPax     = $_POST['ExpectedPax'] ?? '';
$GuaranteedPax   = $_POST['GuaranteedPax'] ?? '';
$GuestName       = strtoupper($_POST['GuestName'] ?? '');
$Company         = strtoupper($_POST['Company'] ?? '');
$MobileNumber    = $_POST['MobileNumber'] ?? '';
$Email           = $_POST['Email'] ?? '';
$CompanyAddress  = $_POST['CompanyAddress'] ?? '';
$Position        = $_POST['Position'] ?? '';
$EngagerCategory = $_POST['EngagerCategory'] ?? '';
$Draftid        = $_POST['Draftid'] ?? '';
$IPAddress  = $_SERVER['REMOTE_ADDR'];
$DeviceName = gethostbyaddr($IPAddress);
$Browser    = $_SERVER['HTTP_USER_AGENT'];

$payments = json_decode($_POST['payments'] ?? '[]', true);

try {

    $conn->beginTransaction();


    /*Validate Record of event*/
    $validation = $conn->prepare("EXEC Validate_BookingEntry ?,?,?,?,?,?");
    $validation->execute([
        $EventTitle,
        $StartDate,
        $EndDate,
        $StartTime,
        $EndTime,
        $Hotel
    ]);

    $val = $validation->fetch(PDO::FETCH_ASSOC);

    if ($val) {
        exit('Sorry, this event already exists.');
    }

    // =========================
    // GENERATE CODE
    // =========================    
    $stmtCode = $conn->prepare("EXEC PencilBooking_Code");
    $stmtCode->execute();
    $row = $stmtCode->fetch(PDO::FETCH_ASSOC);

    $PencilCode = $row['PencilCode'] ?? null;

    if (!$PencilCode) {
        throw new Exception("Failed to generate PencilCode");
    }

    // =========================
    // SAVE BOOKING
    // =========================
    $saveBooking = $conn->prepare("
        EXEC PencilBooking ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
    ");

    $saveBooking->execute([
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
        $Email,
        $CompanyAddress,
        $Position,
        $DeviceName,
        $IPAddress,
        $Browser,
        $PencilCode,
        $Draftid
    ]);

    // =========================
    // SAVE PAYMENTS
    // =========================
    foreach ($payments as $payment) {

        $Type   = $payment['type'] ?? '';
        $Amount = cleanNumber($payment['amount'] ?? 0);

        // -------------------------
        // UNIFIED REFERENCE NUMBER
        // -------------------------
        $TransactionNumber =
            $payment['reference_no']
            ?? $payment['check_number']
            ?? $payment['online_transaction_number']
            ?? '';

        // -------------------------
        // FILE HANDLING
        // -------------------------
        $Attachment = null;

        if ($Type === "Bank Transfer" && isset($_FILES['bank_attachment_file'])) {

            if ($_FILES['bank_attachment_file']['error'] === UPLOAD_ERR_OK) {
                $Attachment = base64_encode(
                    file_get_contents($_FILES['bank_attachment_file']['tmp_name'])
                );
            }
        }

        if ($Type === "Check" && isset($_FILES['check_attachment_file'])) {

            if ($_FILES['check_attachment_file']['error'] === UPLOAD_ERR_OK) {
                $Attachment = base64_encode(
                    file_get_contents($_FILES['check_attachment_file']['tmp_name'])
                );
            }
        }

        // -------------------------
        // SAFE EXEC
        // -------------------------
        $savePayment = $conn->prepare("
            EXEC Create_Payment
            ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
        ");

        $savePayment->execute([
            $User,
            $PencilCode,
            $EventTitle,
            $StartDate,
            $EndDate,
            $GuestName,
            $Company,
            $Type,
            $Amount,
            $BlockingFee,

            $payment['bank'] ?? '',
            $payment['account_name'] ?? '',
            $payment['account_number'] ?? '',
            $TransactionNumber,

            $Attachment,

            $payment['check_post_date'] ?? null,
            $payment['tin'] ?? '',
            $payment['tax_payee'] ?? '',
            cleanNumber($payment['tax_quarter'] ?? 0),

            $Hotel,
            $payment['cashier'] ?? '',
            $payment['or_date'] ?? null
        ]);
    }

    $conn->commit();
    echo "OK";

} catch (Exception $e) {

    if ($conn->inTransaction()) {
        $conn->rollBack();
    }

    echo $e->getMessage();
}