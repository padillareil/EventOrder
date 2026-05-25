<?php
  require_once "../../../config/connection_reil.php";
  session_start();

  $User         = $_SESSION['Uid'];
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSize     = $_POST['PageSize'] ?? 20;
  $Search       = $_POST['Search'];

try {
  $conn->beginTransaction();

    $fetch_activity = $conn->prepare("EXEC dbo.[Activitlogs_Pagination] ?,?,?,?");
    $fetch_activity->execute([$CurrentPage,$PageSize,$Search,$User]);
    $get_activity = $fetch_activity->fetchAll(PDO::FETCH_ASSOC);

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