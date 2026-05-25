<?php
  require_once "../../../../config/connection.php";

  $Uid     = $_POST['Uid'];
  $response    = array();

try {
  $conn->beginTransaction();

    $fetch_account = $conn->prepare("EXEC dbo.[DisplayUser_Details] ?");
    $fetch_account->execute([ $Uid ]);
    $get_details = $fetch_account->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_details
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