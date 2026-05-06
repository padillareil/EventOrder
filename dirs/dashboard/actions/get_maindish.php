<?php
  require_once "../../../config/connection_food.php";
try {
  $conn->beginTransaction();

    $fetch_dish = $conn->prepare("EXEC dbo.[DisplayFood_DinnerandLunch]");
    $fetch_dish->execute();
    $get_dish = $fetch_dish->fetchAll(PDO::FETCH_ASSOC);

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