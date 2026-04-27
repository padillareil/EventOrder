<?php
  require_once "../../../../config/connection.php";

  $Vid  = $_POST['Vid'];

try {
  $conn->beginTransaction();

    $del_menu= $conn->prepare("DELETE FROM VenuePolicy WHERE Vid=?");
    $del_menu->execute([ $Vid ]);

  $conn->commit();
  echo "success";

}catch (PDOException $e){
  $conn->rollback();
  echo "<b>Warning. Please Contact System Developer. <br/></b>".$e->getMessage();
}

?>