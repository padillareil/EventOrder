<?php
require_once "../../../config/connection_booking.php";
session_start();
$User = $_SESSION['Uid'] ?? null;

if (!$User) {
    die("Session expired.");
}

$BookingStatus  = $_POST['BookingStatus'] ?? 'TENTATIVE';
$Tier           = $_POST['Tier'] ?? '';
$Customer       = $_POST['Customer'] ?? '';
$Company        = $_POST['Company'] ?? '';
$Position       = $_POST['Position'] ?? '';
$Address        = $_POST['Address'] ?? '';
$Contact        = $_POST['Contact'] ?? '';
$Email          = $_POST['Email'] ?? '';
$Messenger      = $_POST['Messenger'] ?? '';
$FunctionName   = $_POST['FunctionName'] ?? '';
$FunctionType   = $_POST['FunctionType'] ?? '';
$FuncStartDate  = $_POST['FuncStartDate'] ?? '';
$FuncEndDate    = $_POST['FuncEndDate'] ?? '';
$FuncStartTime  = $_POST['FuncStartTime'] ?? '';
$FuncEndTime    = $_POST['FuncEndTime'] ?? '';
$RatePax        = $_POST['RatePax'] ?? 0;
$BlockingFee    = $_POST['BlockingFee'] ?? 0;
$GuaranteedPax  = $_POST['GuaranteedPax'] ?? 0;
$ExpectedPax    = $_POST['ExpectedPax'] ?? 0;
$FunctionRooms  = $_POST['FunctionRooms'] ?? [];
$FunctionChild  = $_POST['FunctionChild'] ?? [];
$AMSnack        = $_POST['AMSnack'] ?? [];
$PMSnack        = $_POST['PMSnack'] ?? [];
$Lunch          = $_POST['Lunch'] ?? [];
$Dinner         = $_POST['Dinner'] ?? [];
$Beverage       = $_POST['Beverage'] ?? [];

$Inclusions     = $_POST['Inclusions'] ?? [];
try {

    $conn->beginTransaction();
    $fetch_code = $conn->prepare("
        EXEC dbo.[PencilBooking_Code]
    ");

    $fetch_code->execute();

    $get_code = $fetch_code->fetch(PDO::FETCH_ASSOC);

    if (!$get_code) {
        throw new Exception("Unable to generate form number.");
    }

    $FormNumber = $get_code['FormNumber'];

    /* =====================================================
       INSERT HEADER
    ===================================================== */
    $ins_pencilheader = $conn->prepare("EXEC dbo.[CreatePencilBooking_Tentative] ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?");
    $ins_pencilheader->execute([
        $User,
        $FormNumber, 
        $Tier, 
        $Customer, 
        $Company, 
        $Position, 
        $Address, 
        $Contact, 
        $Email, 
        $Messenger, 
        $FunctionType, 
        $FunctionName, 
        $FuncStartDate, 
        $FuncEndDate, 
        $FuncStartTime, 
        $FuncEndTime, 
        $RatePax, 
        $BlockingFee, 
        $GuaranteedPax, 
        $ExpectedPax
    ]);
    /* =====================================================
       INSERT FUNCTION ROOMS
    ===================================================== */
    if (!empty($FunctionRooms)) {

        $ins_room = $conn->prepare("
            EXEC dbo.[CreateRoom_Tentative] ?,?,?
        ");

        foreach ($FunctionRooms as $room) {

            $ins_room->execute([
                $FormNumber,
                $Tier,
                $room
            ]);
        }
    }



    $ins_food = $conn->prepare("
        EXEC dbo.[CreateFoods_Tentative] ?,?,?,?,?
    ");

    /* =====================================================
       AM SNACK
    ===================================================== */
    if (!empty($AMSnack)) {
        foreach ($AMSnack as $food) {
            $FoodName = $food['FoodName'];
            $ServingType = $food['ServingType'];

            $ins_food->execute([
                $FormNumber,        
                $Tier,              
                $FoodName,            
                $ServingType,     
                'AM Snack'     
            ]);
        }
    }


    /* =====================================================
       PM SNACK
    ===================================================== */
    if (!empty($PMSnack)) {

        foreach ($PMSnack as $food) {

            $FoodName = $food['FoodName'];
            $ServingType = $food['ServingType'];

            $ins_food->execute([
                $FormNumber,
                $Tier,
                $FoodName,
                $ServingType,
                'PM Snack'
            ]);
        }
    }

    /* =====================================================
       LUNCH
    ===================================================== */
    if (!empty($Lunch)) {

        foreach ($Lunch as $food) {

            $FoodName = $food['FoodName'];
            $ServingType = $food['ServingType'];

            $ins_food->execute([
                $FormNumber,
                $Tier,
                $FoodName,
                $ServingType,
                'Lunch'
            ]);
        }
    }

    /* =====================================================
       DINNER
    ===================================================== */
    if (!empty($Dinner)) {

        foreach ($Dinner as $food) {

            $FoodName = $food['FoodName'];
            $ServingType = $food['ServingType'];

            $ins_food->execute([
                $FormNumber,
                $Tier,
                $FoodName,
                $ServingType,
                'Dinner'
            ]);
        }
    }

    /* =====================================================
       BEVERAGE
    ===================================================== */
    if (!empty($Beverage)) {

        foreach ($Beverage as $food) {

            $FoodName = $food['FoodName'];
            $ServingType = $food['ServingType'];

            $ins_food->execute([
                $FormNumber,
                $Tier,
                $FoodName,
                $ServingType,
                'Beverage'
            ]);
        }
    }

    /* =====================================================
       INSERT INCLUSIONS
    ===================================================== */
    if (!empty($Inclusions)) {

        $ins_inclusion = $conn->prepare("
            EXEC dbo.[CreateInclusions_Tentative]
                ?,?,?
        ");

        foreach ($Inclusions as $inclusion) {

            $ins_inclusion->execute([
                $FormNumber,
                $Tier,
                $inclusion
            ]);
        }
    }

    /* =====================================================
       COMMIT
    ===================================================== */
    $conn->commit();

    echo json_encode([
        "data"     => "success"
    ]);

} catch (Exception $e) {

    if ($conn->inTransaction()) {
        $conn->rollback();
    }

    echo json_encode([
        "data"  => "error",
        "message" => $e->getMessage()
    ]);
}

?>