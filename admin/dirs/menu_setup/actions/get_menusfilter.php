<?php
  require_once "../../../../config/connection_food.php";
try {
  $conn->beginTransaction();

    $fetch_menucat = $conn->prepare("
      SELECT 
        Category, Mid
      FROM FoodMenu 
      GROUP BY Category, Mid
      ORDER BY Category
    ");
    $fetch_menucat->execute();
    $get_menu = $fetch_menucat->fetchAll(PDO::FETCH_ASSOC);

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