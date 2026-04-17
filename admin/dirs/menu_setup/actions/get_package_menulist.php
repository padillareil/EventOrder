<?php
  require_once "../../../../config/connection_food.php";

try {
  $conn->beginTransaction();

    $fetch_menulist = $conn->prepare("EXEC dbo.[FoodMenus_Event]");
    $fetch_menulist->execute();
    $get_menus = $fetch_menulist->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_menus
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

