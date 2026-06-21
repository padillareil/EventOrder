<?php
  require_once "../../../../config/connection.php";
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSize     = $_POST['PageSize'] ?? 20;
  $DocNum = $_POST['DocNum'];
  
try {
  $conn->beginTransaction();

    $fetch_chargelist = $conn->prepare("EXEC List_EvCharges_Records ?,?,?");
    $fetch_chargelist->execute([$CurrentPage,$PageSize,$DocNum]);
    $get_chargerecord = $fetch_chargelist->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_chargerecord
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