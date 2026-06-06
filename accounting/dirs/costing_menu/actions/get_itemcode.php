<?php
  require_once "../../../../config/connection.php";

try {
  $conn->beginTransaction();

    $fetch_itemcode = $conn->prepare("
      EXEC dbo.[Itemmenu_Code]
    ");
    $fetch_itemcode->execute();
    $get_itemcode = $fetch_itemcode->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_itemcode
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