<?php
  require_once "../../../../../../config/connection_config.php";
  $BasicCurrentPage  = $_POST['BasicCurrentPage'] ?? 1;
  $BasicPageSize     = $_POST['BasicPageSize'] ?? 20;
  $Search       = $_POST['Search'];
  $Tier = 'Basic';

try {
  $conn->beginTransaction();

    $fetch_ = $conn->prepare("EXEC dbo.[FoodPackage_Pagination] ?,?,?,?");
    $fetch_->execute([$BasicCurrentPage,$BasicPageSize,$Search, $Tier]);
    $get_function = $fetch_->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_function
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