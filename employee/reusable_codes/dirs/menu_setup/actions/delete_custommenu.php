<?php
  require_once "../../../../config/connection_food.php";

  $Custom_id  = $_POST['Custom_id'];

try {
  $conn->beginTransaction();

    $del_menu= $conn->prepare("DELETE FROM CustomMenu WHERE Custom_id=?");
    $del_menu->execute([ $Custom_id ]);

  $conn->commit();
  echo "success";

}catch (PDOException $e){
  $conn->rollback();
  echo "<b>Warning. Please Contact System Developer. <br/></b>".$e->getMessage();
}

?>