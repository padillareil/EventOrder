<?php
	require_once "../../../../config/connection_food.php";

	$DishName 	 =	trim($_POST['DishName']);
	$Description =	$_POST['Description'];
	$Ingredient  =	$_POST['Ingredient'];
	$Group 		 = 'Break Fast';
	$Status 	 = 'Active';
	try{

		$conn->beginTransaction();

		/*Validation of entry to prevent duplicate*/
		$validate_entry = $conn->prepare("
		    SELECT COUNT(*) 
		    FROM FoodDish 
		    WHERE DishName = ? AND DishGroup = ?
		 ");
		 $validate_entry->execute([$DishName, $Group]);

		 if ($validate_entry->fetchColumn() > 0) {
		     exit('This menu already exists.');
		 }


		$ins_appetizer = $conn->prepare("INSERT INTO FoodDish
			(DishName, DishGroup,Description,Ingredients,DishStatus
				)VALUES(?,?,?,?,?)");
		$ins_appetizer->execute([$DishName,$Group,$Description, $Ingredient, $Status]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>


