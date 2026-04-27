<?php
	require_once "../../../../config/connection.php";

	$Functionroom 	=	$_POST['Functionroom'];
	$Wing 		=	$_POST['Wing'];
	$FloorLvl 	=	$_POST['FloorLvl'];
	$Capacity 	=	$_POST['Capacity'];
	$Uom 		=	$_POST['Uom'];
	$RentalFee 	=	$_POST['RentalFee'];
	$Note 		=	$_POST['Note'];

	
	try{

		$conn->beginTransaction();

		$ins_ = $conn->prepare("EXEC dbo.[Create_FunctionRoom] ?,?,?,?,?,?,?");
		$ins_->execute([$Functionroom,$Wing, $FloorLvl, $Capacity, $Uom, $RentalFee, $Note]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>

	