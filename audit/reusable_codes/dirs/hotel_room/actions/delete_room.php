<?php
  require_once "../../../../config/connection.php";

  $LineNum  = $_POST['LineNum'];

try {
  $conn->beginTransaction();

    $del_student= $conn->prepare("DELETE FROM RoomChild WHERE LineNum=?");
    $del_student->execute([ $LineNum ]);

  $conn->commit();
  echo "success";

}catch (PDOException $e){
  $conn->rollback();
  echo "<b>Warning. Please Contact System Developer. <br/></b>".$e->getMessage();
}

?>