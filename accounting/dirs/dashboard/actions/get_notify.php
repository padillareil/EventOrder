<?php
  require_once "../../../../config/connection.php";
  session_start();
  $User = $_SESSION['Uid'];

try {
  $conn->beginTransaction();

    $fetch_notify = $conn->prepare("
    EXEC Notify_Me ?
    ");
    $fetch_notify->execute([ $User ]);
    $get_notification = $fetch_notify->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_notification
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