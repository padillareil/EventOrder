<?php
  require_once "../../../../config/connection_food.php";
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSize     = $_POST['PageSize'] ?? 20;
  $Search       = $_POST['Search'];
  $Menu         = 'Snack';

try {
  $conn->beginTransaction();

    $fetch_appetizers = $conn->prepare("EXEC dbo.[FoodMenu_Pagination] ?,?,?,?");
    $fetch_appetizers->execute([$CurrentPage,$PageSize,$Search,$Menu]);
    $get_appetizers = $fetch_appetizers->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_appetizers
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