<?php
  require_once "../../../../../../config/connection_config.php";
  $VipCurrentPage  = $_POST['VipCurrentPage'] ?? 1;
  $VipPageSize     = $_POST['VipPageSize'] ?? 20;
  $Search       = $_POST['Search'];
  $Tier         = 'VIP';
try {
  $conn->beginTransaction();

    $fetch_premium = $conn->prepare("EXEC dbo.[BasicFunction_Pagination] ?,?,?,?");
    $fetch_premium->execute([$VipCurrentPage,$VipPageSize,$Search,$Tier]);
    $get_premiumfunction = $fetch_premium->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_premiumfunction
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