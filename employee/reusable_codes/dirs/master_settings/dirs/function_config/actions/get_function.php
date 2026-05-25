<?php
  require_once "../../../../../../config/connection_config.php";

  $DocEntry     = $_POST['DocEntry'];
  $response    = array();

try {
  $conn->beginTransaction();

    $fetch_function = $conn->prepare("
      SELECT 
      DocEntry,
      RefNumber,
      SpaceStatus,
      Property,
      PropertyAddress,
      FunctionTier,
      FunctionName,
      Wing,
      Venue,
      RentalFee,
      PaxCapacity,
      ChairCapacity,
      TableCapacity,
      RoomSize
      FROM Function_Config  
      WHERE DocEntry = ?
    ");
    $fetch_function->execute([ $DocEntry ]);
    $get_roomfunction = $fetch_function->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_roomfunction
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