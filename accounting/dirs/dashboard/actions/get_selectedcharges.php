<?php
  require_once "../../../../config/connection.php";
  $Slip_RefNo     = $_POST['Slip_RefNo'];

try {
  $conn->beginTransaction();

    $fetch_charges = $conn->prepare("
      EXEC Review_EventCharges ? 
    ");
    $fetch_charges->execute([ $Slip_RefNo ]);
    $get_viewchar = $fetch_charges->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_viewchar
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