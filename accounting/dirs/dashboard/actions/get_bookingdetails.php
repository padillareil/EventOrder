<?php
  require_once "../../../../config/connection.php";
  session_start();

  $User     = $_SESSION['Uid'];
  $BookingNum = $_POST['BookingNum'];
try {
  $conn->beginTransaction();

    $fetch_bookingdetails = $conn->prepare("
      EXEC Booking_Details ?, ?
    ");
    $fetch_bookingdetails->execute([ $User, $BookingNum ]);
    $get_booking = $fetch_bookingdetails->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_booking
  );
  echo json_encode($response);

}catch (PDOException $e){
  $conn->rollback();
  $response = array(
    "isSuccess" => 'Failed',
    "Data" => "<b>Error. Please Contact System Developer. <br/></b>".$e->getMessage()
  );
  echo json_encode($response);
}
?>