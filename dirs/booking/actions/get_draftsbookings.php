<?php
  require_once "../../../config/connection.php";
  session_start();

  $User         = $_SESSION['Uid'];
  $CurrentPageDraft  = $_POST['CurrentPageDraft'] ?? 1;
  $PageSizeDraft     = $_POST['PageSizeDraft'] ?? 20;
  $Search       = $_POST['Search'];

try {
  $conn->beginTransaction();

    $fetch_events = $conn->prepare("EXEC dbo.[Draft_Events] ?,?,?,?");
    $fetch_events->execute([$User,$CurrentPageDraft,$PageSizeDraft,$Search]);
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