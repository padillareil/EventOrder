<?php
require_once "../../../../config/connection.php";
session_start();
$User = $_SESSION['Uid'];

$SlipNum       = $_POST['SlipNum']; 
$BookigNum     = $_POST['BookigNum'];
$EventName     = $_POST['EventName']; 
$GuestName     = $_POST['GuestName'];
$ChargeType    = $_POST['ChargeType']; 
$IncidentDate  = $_POST['IncidentDate']; 
$IncidentTime  = $_POST['IncidentTime']; 
$Quantity      = $_POST['Quantity']; 
$Description   = $_POST['Description']; 

$UnitCost = str_replace(',', '', $_POST['UnitCost']);
$ChargeAmount = str_replace(',', '', $_POST['ChargeAmount']);

$EvidencePath = null;


try {

    $conn->beginTransaction();

    if(isset($_FILES['Evidence']) && $_FILES['Evidence']['error'] === 0){
        $folder = "../../../../assets/image/evidence/";
        if(!is_dir($folder)){
            mkdir($folder,0777,true);
        }
        $extension = pathinfo(
            $_FILES['Evidence']['name'],
            PATHINFO_EXTENSION
        );

        $FileName = 
            $SlipNum . "_" . time() . "." . $extension;
        $target = $folder . $FileName;
        if(move_uploaded_file(
            $_FILES['Evidence']['tmp_name'],
            $target
        )){
            $EvidencePath =
                "assets/image/evidence/" . $FileName;
        }

    }




    $ins_charges = $conn->prepare("
        EXEC SubmitEvent_Charges ?,?,?,?,?,?,?,?,?,?,?,?,?
    ");


    $ins_charges->execute([
        $User,
        $SlipNum,
        $BookigNum,
        $EventName,
        $GuestName,
        $ChargeType,
        $IncidentDate,
        $IncidentTime,
        $Quantity,
        $Description,
        $UnitCost,
        $ChargeAmount,
        $EvidencePath
    ]);



    $conn->commit();
    echo "OK";


}
catch(PDOException $e){
    if($conn->inTransaction()){
        $conn->rollback();
    }
    echo "Error: ".$e->getMessage();

}

?>