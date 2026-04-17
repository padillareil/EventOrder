<?php
  require_once "../../../../config/connection_food.php";

  $DocEntry  = $_POST['DocEntry'];

try {
  $conn->beginTransaction();

    $del_menu= $conn->prepare("DELETE FROM Event_Food_Package_H WHERE DocEntry=?");
    $del_menu->execute([ $DocEntry ]);

  $conn->commit();
  echo "success";

}catch (PDOException $e){
  $conn->rollback();
  echo "<b>Warning. Please Contact System Developer. <br/></b>".$e->getMessage();
}

?>