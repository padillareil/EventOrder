<?php
	require_once "../../../../config/connection.php";

	$RoomName 	=	$_POST['RoomName'];
	$Uom 		=	$_POST['Uom'];
	$Capacity 	=	$_POST['Capacity'];
	$Rental = str_replace(',', '', $_POST['Rental']);
	$Fee = trim($Rental);
	$Motherid 	=	$_POST['Motherid'];

	
	try{

		$conn->beginTransaction();

		// Validate duplicate
		$validate_entry = $conn->prepare("
		    SELECT COUNT(*) 
		    FROM RoomChild 
		    WHERE RoomName = ?
		");
		$validate_entry->execute([$RoomName]);

		if ($validate_entry->fetchColumn() > 0) {
		    $conn->rollBack();
		    exit('This room already exists.');
		}


		$ins_ = $conn->prepare("EXEC dbo.[CreateFunctionRoom_Partition] ?,?,?,?,?");
		$ins_->execute([$RoomName,$Capacity, $Uom ,$Fee, $Motherid]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>

	