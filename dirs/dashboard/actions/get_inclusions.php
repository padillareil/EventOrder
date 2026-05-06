<?php
  require_once "../../../config/connection_food.php";


try {
  $conn->beginTransaction();

    $fetch_inclusions = $conn->prepare("EXEC dbo.[Display_BookingInclusions]");
    $fetch_inclusions->execute();
    $get_inclusions = $fetch_inclusions->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_inclusions
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