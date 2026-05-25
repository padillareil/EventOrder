<?php
  require_once "../../../../config/connection.php";

  $Function_id  = $_POST['Function_id'];

try {
  $conn->beginTransaction();


    $del_room= $conn->prepare("DELETE FROM HotelRooms WHERE Function_id=?");
    $del_room->execute([ $Function_id ]);
    
    $del_room= $conn->prepare("DELETE FROM RoomChild WHERE Functionid=?");
    $del_room->execute([ $Function_id ]);

  $conn->commit();
  echo "success";

}catch (PDOException $e){
  $conn->rollback();
  echo "<b>Warning. Please Contact System Developer. <br/></b>".$e->getMessage();
}

?>