<?php
  require_once "../../../../config/connection.php";

  $DocId     = $_POST['DocId'];

try {
  $conn->beginTransaction();

    $fetch_details = $conn->prepare("EXEC dbo.[ReviewBooking] ?");
    $fetch_details->execute([ $DocId ]);
    $get_details = $fetch_details->fetch(PDO::FETCH_ASSOC);

    $fetch_arrangemnt->nextRowset();
    $equipment = $fetch_arrangemnt->fetchAll(PDO::FETCH_ASSOC);

    $fetch_food->nextRowset();
    $food = $fetch_food->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_details,
    "Equipment" => $equipment,
    "Food" => $food

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

