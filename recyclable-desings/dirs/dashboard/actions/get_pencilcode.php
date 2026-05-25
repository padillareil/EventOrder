<?php
  require_once "../../../config/connection_booking.php";

try {
  $conn->beginTransaction();

    $fetch_pencilcode = $conn->prepare("EXEC dbo.[PencilBooking_Code]");
    $fetch_pencilcode->execute();
    $get_code = $fetch_pencilcode->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_code
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