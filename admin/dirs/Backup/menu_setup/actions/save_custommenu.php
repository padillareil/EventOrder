<?php
	require_once "../../../../config/connection_food.php";

	$DishName 	 =	trim($_POST['DishName']);
	$Description =	$_POST['Description'];
	$Ingredient  =	$_POST['Ingredient'];
	$Category  =	$_POST['Category'];
	try{

		$conn->beginTransaction();

		/*Validation of entry to prevent duplicate*/
		$validate_entry = $conn->prepare("
		    SELECT COUNT(*) 
		    FROM CustomMenu 
		    WHERE CustomMenuName = ? AND FoodGroup = ?
		 ");
		 $validate_entry->execute([$DishName, $Category]);

		 if ($validate_entry->fetchColumn() > 0) {
		     exit('This menu already exists.');
		 }


		 $fetch_custom = $conn->prepare("EXEC dbo.[CustomMenu_Code]");
		 $fetch_custom->execute();
		 $get_customcode = $fetch_custom->fetch(PDO::FETCH_ASSOC);
		 $CustomCode = $get_customcode['CustomCode'];


		$ins_appetizer = $conn->prepare("EXEC dbo.[Create_Custom_Menu] ?,?,?,?,?");
		$ins_appetizer->execute([$CustomCode,$DishName,$Category,$Description, $Ingredient]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>



