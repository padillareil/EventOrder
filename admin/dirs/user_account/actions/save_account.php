<?php
	require_once "../../../../config/connection.php";
	require_once "../../../../config/functions.php";

	$Username 	=	$_POST['Username'];
	$Password 	=	hash_password($_POST['Password']);
	$Fullname 	=	$_POST['Fullname'];
	$Position 	=	$_POST['Position'];
	$Hotel 		=	$_POST['Hotel'];
	$AccountType =	$_POST['AccountType'];

	
	try{

		$conn->beginTransaction();
		// Validate duplicate
		$validate_entry = $conn->prepare("
		    SELECT COUNT(*) 
		    FROM SysAccount 
		    WHERE Username = ? AND Fullname = ? OR (Username = ?)
		");
		$validate_entry->execute([$Username, $Fullname, $Username]);

		if ($validate_entry->fetchColumn() > 0) {
		    $conn->rollBack();
		    exit('This account already exists.');
		}
		
		// Generate User Code
		$fetch_usercode = $conn->prepare("EXEC dbo.[UserCode]");
		$fetch_usercode->execute();
		$get_code = $fetch_usercode->fetch(PDO::FETCH_ASSOC);
		$UserCode = $get_code['UserCode'];

		$ins_account = $conn->prepare("EXEC dbo.[CreateAccount_EndUser2026] ?,?,?,?,?,?,?");
		$ins_account->execute([$UserCode, $Username,$Password, $Fullname, $Position, $Hotel, $AccountType]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>


