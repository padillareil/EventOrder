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
	$Evidence = $_POST['Evidence'] ?? '';
	try{

		$conn->beginTransaction();


		if (!empty($Evidence)) {

		    $Evidence = preg_replace(
		        '#^data:image/\w+;base64,#i',
		        '',
		        $Evidence
		    );

		} else {

		    $Evidence = null;

		}


		$ins_charges = $conn->prepare("EXEC SubmitEvent_Charges ?,?,?,?,?,?,?,?,?,?,?,?,?");
		$ins_charges->execute([$User,$SlipNum, $BookigNum, $EventName, $GuestName, $ChargeType, $IncidentDate, $IncidentTime, $Quantity, $Description, $UnitCost, $ChargeAmount, $Evidence]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>

