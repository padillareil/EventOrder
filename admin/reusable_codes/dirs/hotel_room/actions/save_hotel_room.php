<?php
	require_once "../../../../config/connection.php";

	$Functionroom 	=	$_POST['Functionroom'];
	$Wing 		=	$_POST['Wing'];
	$FloorLvl 	=	$_POST['FloorLvl'];
	$Capacity 	=	$_POST['Capacity'];
	$Uom 		=	$_POST['Uom'];
	$RentalFee = str_replace(',', '', $_POST['RentalFee']);
	$Fee = trim($RentalFee);
	$Note 		=	$_POST['Note'];

	
	try{

		$conn->beginTransaction();


		// Validate duplicate
		$validate_entry = $conn->prepare("
		    SELECT COUNT(*) 
		    FROM HotelRooms 
		    WHERE FunctionName = ?
		");
		$validate_entry->execute([$Functionroom]);

		if ($validate_entry->fetchColumn() > 0) {
		    $conn->rollBack();
		    exit('This function room already exists.');
		}


		$ins_ = $conn->prepare("EXEC dbo.[Create_FunctionRoom] ?,?,?,?,?,?,?");
		$ins_->execute([$Functionroom,$Wing, $FloorLvl, $Capacity, $Uom, $Fee, $Note]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>

	