<?php
  require_once "../../../../config/connection.php";


  $DocEntry     = $_POST['DocEntry'];


try {
  $conn->beginTransaction();

    $fetch_update = $conn->prepare("EXEC Check_IngredientPrice ?");
    $fetch_update->execute([ $DocEntry ]);
    $get_price = $fetch_update->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_price
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