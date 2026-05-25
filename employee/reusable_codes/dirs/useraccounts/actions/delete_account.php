<?php
  require_once "../../../../config/connection.php";

  $Uid  = $_POST['Uid'];

try {
  $conn->beginTransaction();

    $del_account= $conn->prepare("DELETE FROM SysAccount WHERE Uid=?");
    $del_account->execute([ $Uid ]);

  $conn->commit();
  echo "success";

}catch (PDOException $e){
  $conn->rollback();
  echo "<b>Warning. Please Contact System Developer. <br/></b>".$e->getMessage();
}

?>