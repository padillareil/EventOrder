<?php
	require_once "../../../../../../config/connection_config.php";

	$Property 	=	$_POST['Property'];
	$Tier 		=	$_POST['Tier'];
	$Functionroom 	=	$_POST['Functionroom'];
	$HotelAddress 	=	$_POST['HotelAddress'];
	$WingFloor 		=	$_POST['WingFloor'];
	$VenueType 		=	$_POST['VenueType'];
	$RentalFee = str_replace(',', '', $_POST['RentalFee']);
	$Fee = trim($RentalFee);
	$PaxCapacity 	=	$_POST['PaxCapacity'];
	$ChairCapacity 	=	$_POST['ChairCapacity'];
	$TableCapacity 	=	$_POST['TableCapacity'];
	$Roomsize 		=	$_POST['Roomsize'];
	
	try{

		$conn->beginTransaction();


		$validate_entry = $conn->prepare("
		    SELECT COUNT(*) AS TotalCount
		    FROM Function_Config
		    WHERE Property = ?
		    AND FunctionTier = ?
		    AND FunctionName = ?
		");

		$validate_entry->execute([
		    $Property,
		    $Tier,
		    $Functionroom
		]);

		$totalCount = $validate_entry->fetchColumn();

		if ($totalCount > 0) {

		    exit(
		        'This function room already exists for Tier: ' . $Tier
		    );
		}

		$ins_function = $conn->prepare("EXEC dbo.[CreateFunction_Configuration] ?,?,?,?,?,?,?,?,?,?,?");
		$ins_function->execute([$Property,$HotelAddress, $Tier, $Functionroom, $WingFloor, $VenueType, $Fee, $PaxCapacity, $ChairCapacity, $TableCapacity, $Roomsize]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>



