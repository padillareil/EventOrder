<?php
  require_once "../../../../../../config/connection_config.php";

  $DocEntry  = $_POST['DocEntry'];

try {
  $conn->beginTransaction();

    $del_record= $conn->prepare("DELETE FROM Function_Config WHERE DocEntry=?");
    $del_record->execute([ $DocEntry ]);

  $conn->commit();
  echo "success";

}catch (PDOException $e){
  $conn->rollback();
  echo "<b>Warning. Please Contact System Developer. <br/></b>".$e->getMessage();
}

?>