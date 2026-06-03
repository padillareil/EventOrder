<?php
  require_once "../../../config/connection.php";
  session_start();

  $User         = $_SESSION['Uid'];
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSize     = $_POST['PageSize'] ?? 20;
  $Search       = $_POST['Search'];

try {
  $conn->beginTransaction();

    $fetch_events = $conn->prepare("EXEC dbo.[Inbox_Events] ?,?,?,?");
    $fetch_events->execute([$User,$CurrentPage,$PageSize,$Search]);
    $get_activity = $fetch_events->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_activity
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