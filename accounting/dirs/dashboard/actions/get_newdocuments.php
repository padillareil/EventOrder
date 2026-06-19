<?php
  require_once "../../../../config/connection.php";
  session_start();
  $User = $_SESSION['Uid'];
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSize     = $_POST['PageSize'] ?? 20;
  $Search       = $_POST['Search'];
  
try {
  $conn->beginTransaction();

    $fetch_approval = $conn->prepare("EXEC dbo.[NewDocs_For_Approval_List] ?,?,?,?");
    $fetch_approval->execute([$User,$CurrentPage,$PageSize,$Search]);
    $get_approval = $fetch_approval->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_approval
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