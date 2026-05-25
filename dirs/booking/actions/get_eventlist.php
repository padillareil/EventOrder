<?php
  require_once "../../../config/connection.php";
  session_start();
  $User = $_SESSION['Uid'];
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSize     = $_POST['PageSize'] ?? 20;
  $Search       = $_POST['Search'];
  $Sort       = $_POST['Sort'];
  $FilterStatus = $_POST['FilterStatus'];
  $IPAddress = $_SERVER['REMOTE_ADDR'];/*User Device Ip Address*/
  $DeviceName = gethostbyaddr($IPAddress); /*Device host used details*/
  $Browser = $_SERVER['HTTP_USER_AGENT']; /*User Browser used*/

try {
  $conn->beginTransaction();

    $fetch_eventlist = $conn->prepare("EXEC dbo.[AllEvents_List_Pagination] ?,?,?,?,?,?,?,?,?");
    $fetch_eventlist->execute([$User,$CurrentPage,$PageSize,$Search, $Sort,$FilterStatus, $IPAddress, $DeviceName, $Browser]);
    $get_events = $fetch_eventlist->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_events
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