<?php
  require_once "../../../config/connection.php";
  session_start();

  $User = $_SESSION['Uid'];
  $DocId     = $_POST['DocId'];
  $IPAddress  = $_SERVER['REMOTE_ADDR'];
  $DeviceName = gethostbyaddr($IPAddress);
  $Browser    = $_SERVER['HTTP_USER_AGENT'];

try {
  $conn->beginTransaction();

    $fetch_details = $conn->prepare("EXEC dbo.[Retrieved_Booking] ?,?,?,?,?");
    $fetch_details->execute([$User, $DocId, $DeviceName, $IPAddress, $Browser]);

    $get_draft = $fetch_details->fetch(PDO::FETCH_ASSOC);

    $fetch_details->nextRowset();
    $equipment = $fetch_details->fetchAll(PDO::FETCH_ASSOC);

    $fetch_details->nextRowset();
    $food = $fetch_details->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
      "isSuccess" => "success",
      "Data" => $get_draft,
      "Equipment" => $equipment,
      "Food" => $food
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