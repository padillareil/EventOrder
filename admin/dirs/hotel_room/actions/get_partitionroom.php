<?php
  require_once "../../../../config/connection.php";

  $LineNum     = $_POST['LineNum'];

try {
  $conn->beginTransaction();

    $fetch_roomchild = $conn->prepare("
      SELECT LineNum, RoomName,MaxCapacity,Uom,RentalFee
      FROM RoomChild 
      WHERE LineNum = ?
    ");
    $fetch_roomchild->execute([ $LineNum ]);
    $get_rooms = $fetch_roomchild->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_rooms
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

