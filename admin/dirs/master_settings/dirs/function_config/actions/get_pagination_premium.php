<?php
  require_once "../../../../../../config/connection_config.php";
  $PremiumCurrentPage  = $_POST['PremiumCurrentPage'] ?? 1;
  $PremiumPageSize     = $_POST['PremiumPageSize'] ?? 20;
  $Search       = $_POST['Search'];
  $Tier         = 'Premium';
try {
  $conn->beginTransaction();

    $fetch_premium = $conn->prepare("EXEC dbo.[BasicFunction_Pagination] ?,?,?,?");
    $fetch_premium->execute([$PremiumCurrentPage,$PremiumPageSize,$Search,$Tier]);
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