<?php
  require_once "../../../../config/connection.php";

try {
  $conn->beginTransaction();

    $fetch_eventcode = $conn->prepare("EXEC dbo.[EventPackageCode]");
    $fetch_eventcode->execute();
    $get_eventcode = $fetch_eventcode->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_eventcode
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

