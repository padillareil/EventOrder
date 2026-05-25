<?php
  require_once "../../../../../../config/connection_config.php";

  $DocEntry     = $_POST['DocEntry'];
  $response    = array();

try {
  $conn->beginTransaction();

    $fetch_food = $conn->prepare("
      SELECT 
      DocEntry,
      RefNumber,
      EventType,
      Tier,
      Description,
      MinPax,
      MaxPax,
      AMSnack,
      PMSnack,
      Lunch,
      Dinner,
      Beverage,
      PackageStatus,
      ServingType
      FROM Foods_Config  
      WHERE DocEntry = ?
    ");
    $fetch_food->execute([ $DocEntry ]);
    $get_foodconfig = $fetch_food->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_foodconfig
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