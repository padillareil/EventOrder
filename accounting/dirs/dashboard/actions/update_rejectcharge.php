<?php
require_once "../../../../config/connection.php";
session_start();

$User  = $_SESSION['Uid'];
$SlipNom   = $_POST['SlipNom'];
$Remarks = $_POST['Remarks'];

try {
    $conn->beginTransaction();

    /*Validate document actions charges slip*/
    $validation = $conn->prepare("EXEC Validate_ChargeSlip ?,?");
    $validation->execute([
        $User,
        $SlipNom
    ]);

    $val = $validation->fetch(PDO::FETCH_ASSOC);

    if ($val) {
        exit('Sorry, this slip has already been processed.');
    }

    $upd_chargerejection = $conn->prepare("EXEC Apply_RejectCharge ?, ?, ?");
    $upd_chargerejection->execute([$User,$SlipNom,$Remarks]);

    $conn->commit();
    echo "success";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
    