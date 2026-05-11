<?php
	require_once "../../../../../../config/connection_config.php";

	$EventType 	=	$_POST['EventType'];
	$Tier 		=	$_POST['Tier'];
	$ServiceType 		=	$_POST['ServiceType'];
	$Description =	$_POST['Description'];
	$MinPax 	=	$_POST['MinPax'];
	$MaxPax 	=	$_POST['MaxPax'];
	$AMSnack 	=	$_POST['AMSnack'];
	$PMSnack 	=	$_POST['PMSnack'];
	$Lunch 		=	$_POST['Lunch'];
	$Dinner 	=	$_POST['Dinner'];
	$Bverage 	=	$_POST['Bverage'];

	try{

		$conn->beginTransaction();

		/* =====================================================
		   VALIDATE DUPLICATE FOOD CONFIGURATION
		===================================================== */

		$validate_entry = $conn->prepare("
		    SELECT COUNT(*) AS TotalCount, Tier
		    FROM Foods_Config
		    WHERE EventType = ?
		    AND Tier = ?
		    GROUP BY Tier
		");

		$validate_entry->execute([
		    $EventType,
		    $Tier
		]);

		$validate_data = $validate_entry->fetch(PDO::FETCH_ASSOC);

		if ($validate_data && $validate_data['TotalCount'] > 0) {

		    $PkgTier = $validate_data['Tier'];

		    exit(
		        'Food configuration already exists for Tier: ' . $PkgTier
		    );
		}


		$ins_food = $conn->prepare("EXEC dbo.[CreateFoodPackage_Configuration] ?,?,?,?,?,?,?,?,?,?,?");
		$ins_food->execute([$EventType,$Tier, $Description, $MinPax, $MaxPax, $AMSnack, $PMSnack, $Lunch, $Dinner, $Bverage,$ServiceType]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>



