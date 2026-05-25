<?php
  require_once "../../../../../../config/connection_config.php";
  $vipCurrentPage  = $_POST['vipCurrentPage'] ?? 1;
  $vipPageSize     = $_POST['vipPageSize'] ?? 20;
  $Search       = $_POST['Search'];
  $Tier         = 'VIP';
try {
  $conn->beginTransaction();

    $fetch_premium = $conn->prepare("EXEC dbo.[BasicFunction_Pagination] ?,?,?,?");
    $fetch_premium->execute([$vipCurrentPage,$vipPageSize,$Search,$Tier]);
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