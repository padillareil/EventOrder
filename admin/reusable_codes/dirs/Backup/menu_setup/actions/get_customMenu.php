<?php
  require_once "../../../../config/connection_food.php";

  $Custom_id     = $_POST['Custom_id'];
  $response    = array();

try {
  $conn->beginTransaction();

    $fetch_menu = $conn->prepare("
      SELECT Custom_id, CustomMenuName, CustomCode, FoodGroup, Description,Ingredients
      FROM CustomMenu
      WHERE Custom_id=?
    ");
    $fetch_menu->execute([ $Custom_id ]);
    $get_menu = $fetch_menu->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_menu
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