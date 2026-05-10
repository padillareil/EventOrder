<?php
  require_once "../../../config/connection_food.php";
try {
  $conn->beginTransaction();

    $fetch_beverage = $conn->prepare("EXEC dbo.[DisplayFood_Beverage]");
    $fetch_beverage->execute();
    $get_dish = $fetch_beverage->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_dish
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