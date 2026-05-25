<?php
  require_once "../../../../config/connection_food.php";

  $LineNum  = $_POST['LineNum'];

try {
  $conn->beginTransaction();

    $del_menu= $conn->prepare("DELETE FROM FoodDish WHERE LineNum=?");
    $del_menu->execute([ $LineNum ]);

  $conn->commit();
  echo "success";

}catch (PDOException $e){
  $conn->rollback();
  echo "<b>Warning. Please Contact System Developer. <br/></b>".$e->getMessage();
}

?>