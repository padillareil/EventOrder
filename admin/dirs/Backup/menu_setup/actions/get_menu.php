<?php
  require_once "../../../../config/connection_food.php";

  $LineNum     = $_POST['LineNum'];
  $response    = array();

try {
  $conn->beginTransaction();

    $fetch_menu = $conn->prepare("
      SELECT LineNum, DishName, DishGroup, Description, Ingredients
      FROM FoodDish
      WHERE LineNum=?
    ");
    $fetch_menu->execute([ $LineNum ]);
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