<?php
  require_once "../../../../config/connection_food.php";
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSize     = $_POST['PageSize'] ?? 20;
  $Search       = $_POST['Search'];

try {
  $conn->beginTransaction();

    $fetch_inclusions = $conn->prepare("EXEC dbo.[EventInclusion_List] ?,?,?");
    $fetch_inclusions->execute([$CurrentPage,$PageSize,$Search]);
    $get_inclusionList = $fetch_inclusions->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_inclusionList
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