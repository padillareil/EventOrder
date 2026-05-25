<?php
	require_once "../../../../config/connection.php";

	$Description 	=	$_POST['Description'];
	$Category 	=	$_POST['Category'];
	$Rental 	=	$_POST['Rental'];
	$Corkage 	=	$_POST['Corkage'];
	$Notes 		=	$_POST['Notes'];

	
	try{

		$conn->beginTransaction();

		$ins_amenities = $conn->prepare("EXEC dbo.[Create_Amenities] ?,?,?,?,?");
		$ins_amenities->execute([$Description,$Category, $Rental, $Corkage, $Notes]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>

	