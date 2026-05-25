<?php
  require_once "../../../config/connection.php";

  $docId     = $_POST['docId'];
  $response    = array();

try {
  $conn->beginTransaction();

    $fetch_booking = $conn->prepare("EXEC dbo.[ReviewBooking] ?");
    $fetch_booking->execute([ $docId ]);
    $get_booking = $fetch_booking->fetch(PDO::FETCH_ASSOC);

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