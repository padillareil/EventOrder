<?php
  require_once "../../../config/connection_food.php";
try {
  $conn->beginTransaction();

    $fetch_snacks = $conn->prepare("EXEC dbo.[DisplayFood_Snacks]");
    $fetch_snacks->execute();
    $get_foodsnack = $fetch_snacks->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_foodsnack
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