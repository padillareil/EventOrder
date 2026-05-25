<?php
  require_once "../../../../config/connection.php";
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSizePartition     = $_POST['PageSizePartition'] ?? 10;
  $Search       = $_POST['Search'];
  $Functionid       = $_POST['Functionid'];

try {
  $conn->beginTransaction();

    $fetch_partitionrooms = $conn->prepare("EXEC dbo.[RoomPartition_Pagination] ?,?,?,?");
    $fetch_partitionrooms->execute([$CurrentPage,$PageSizePartition,$Search, $Functionid]);
    $get_rooms = $fetch_partitionrooms->fetchAll(PDO::FETCH_ASSOC);

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