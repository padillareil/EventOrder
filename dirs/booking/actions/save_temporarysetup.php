	<?php
	require_once "../../../config/connection.php";
	session_start();

	$User = $_SESSION['Uid'];

	$DocumentId   	= $_POST['DocumentId'];
	$RatePax = !empty($_POST['RatePax']) ? (float) str_replace(',', '', $_POST['RatePax']) : 0;
	$PackageCost = !empty($_POST['PackageCost']) ? (float) str_replace(',', '', $_POST['PackageCost']) : 0;
	$Instruction  	= !empty($_POST['Instruction']) ? $_POST['Instruction'] : null;

	$Equipment = isset($_POST['Equipment'])
	    ? json_decode($_POST['Equipment'], true)
	    : [];

	$Menu = isset($_POST['Menu'])
	    ? json_decode($_POST['Menu'], true)
	    : [];

	try {

	    $conn->beginTransaction();

	    // =========================
	    // BOOKING HEADER
	    // =========================
	    $ins_booking = $conn->prepare("EXEC dbo.[UpdateBookingInfo] ?, ?, ?, ?, ?");
	    $ins_booking->execute([
	        $User,
	        $DocumentId,
	        $RatePax,
	        $PackageCost,
	        $Instruction
	    ]);


	    $clean_record = $conn->prepare("EXEC dbo.[CleanDraft_Setup] ?");
	    $clean_record->execute([
	        $DocumentId
	    ]);



	    // =========================
	    // EQUIPMENT LOOP
	    // =========================
	    foreach ($Equipment as $item) {

	        $name = $item['name'] ?? null;
	        $category = $item['category'] ?? null;
	        $desc = $item['description'] ?? null;

	        $ins_equipment = $conn->prepare("EXEC dbo.[Setup_Equipment] ?, ?, ?, ?, ?");
	        $ins_equipment->execute([
	            $User,
	            $DocumentId,
	            $name,
	            $category,
	            $desc
	        ]);
	    }


	    // // =========================
	    // // MENU LOOP
	    // // =========================
	    foreach ($Menu as $item) {

	        $name = $item['name'] ?? null;
	        $category = $item['category'] ?? null;
	        $desc = $item['description'] ?? null;

	        $ins_menu = $conn->prepare("EXEC dbo.[Setup_Menu] ?, ?, ?, ?, ?");
	        $ins_menu->execute([
	            $User,
	            $DocumentId,
	            $name,
	            $category,
	            $desc
	        ]);
	    }

	  

	    $conn->commit();

	    echo "success";

	} catch (PDOException $e) {

	    $conn->rollback();

	    echo "<b>Warning. Please Contact System Developer.<br/></b>" . $e->getMessage();
	}
	?>