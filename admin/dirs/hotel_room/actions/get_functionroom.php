<?php
  require_once "../../../../config/connection.php";

  $Function_id     = $_POST['Function_id'];

try {
  $conn->beginTransaction();

    $fetch_function = $conn->prepare("
      SELECT Function_id,
      FunctionName,
      HotelWing,
      FloorLevel,
      MaxCapacity,
      UoM,
      RentalFee,
      Notes
      FROM HotelRooms 
      WHERE Function_id = ?
    ");
    $fetch_function->execute([ $Function_id ]);
    $get_id = $fetch_function->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_id
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

