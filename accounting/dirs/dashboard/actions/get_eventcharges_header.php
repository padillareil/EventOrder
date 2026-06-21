<?php
  require_once "../../../../config/connection.php";

  $BookingNum     = $_POST['BookingNum'];

try {
  $conn->beginTransaction();

    $fetch_chargesheader = $conn->prepare("
      EXEC EventCharges_Header ?
    ");
    $fetch_chargesheader->execute([ $BookingNum ]);
    $get_header = $fetch_chargesheader->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_header
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