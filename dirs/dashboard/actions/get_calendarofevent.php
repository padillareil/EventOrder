<?php
  require_once "../../../config/connection.php";

  $Month     = $_POST['Month'];
  $Year     = $_POST['Year'];

try {
  $conn->beginTransaction();

    $fetch_calendarofevent = $conn->prepare("EXEC dbo.[Calendarof_Events] ?, ?");
    $fetch_calendarofevent->execute([ $Month, $Year ]);
    $get_event = $fetch_calendarofevent->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_event
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