<?php
  require_once "../../../../config/connection.php";
  session_start();
  $User = $_SESSION['Uid'];
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSize     = $_POST['PageSize'] ?? 20;
  $Search       = $_POST['Search'];
  
try {
  $conn->beginTransaction();

    $fetch_othercharges = $conn->prepare("EXEC dbo.[Eventorder_Charges_List] ?,?,?,?");
    $fetch_othercharges->execute([$User,$CurrentPage,$PageSize,$Search]);
    $get_charges = $fetch_othercharges->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_charges
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