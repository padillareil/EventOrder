<?php
require_once "../../../../config/connection.php";

$Usercode = $_POST['Usercode'];
$Status   = $_POST['Status'];
$Roles    = json_decode($_POST['Roles'], true);

try {
    $conn->beginTransaction();


    // Update Role permissions (0/1 per column)
    $stmt2 = $conn->prepare("
        UPDATE SysRole
        SET 
            Audit_Access = ?,
            Accounting_Access = ?,
            AccountingManager_Access = ?,
            AccountingStaff_Access = ?,
            BanquetCoordinator_Access = ?,
            BillingOfficer_Access = ?,
            EventCoordinator_Access = ?,
            Housekeeping_Access = ?,
            OperationManager_Access = ?,
            SalesManager_Access = ?,
            SalesExecutive_Access = ?,
            ReservationOfficer_Access = ?,
            Production_Access = ?
        WHERE UserCode = ?
    ");

    $stmt2->execute([
        $Roles['Audit'] ?? 0,
        $Roles['AccountingAdmin'] ?? 0,
        $Roles['AccountingManager'] ?? 0,
        $Roles['AccountingStaff'] ?? 0,
        $Roles['BanquetCoordinator'] ?? 0,
        $Roles['BillingOfficer'] ?? 0,
        $Roles['EventCoordinator'] ?? 0,
        $Roles['Housekeeping'] ?? 0,
        $Roles['OperationManager'] ?? 0,
        $Roles['SalesManager'] ?? 0,
        $Roles['SalesExecutive'] ?? 0,
        $Roles['ReservationOfficer'] ?? 0,
        $Roles['Production'] ?? 0,
        $Usercode
    ]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>