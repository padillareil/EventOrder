<?php
  require_once "../../../../config/connection.php";

  $Vid     = $_POST['Vid'];
  $response    = array();

try {
  $conn->beginTransaction();

    $fetch_asdsadsada = $conn->prepare("
      SELECT Vid, ItemDescription, ItemCategory, RentalFee, CorkageFee, Notes
      FROM VenuePolicy 
      WHERE Vid = ?
    ");
    $fetch_asdsadsada->execute([ $Vid ]);
    $get_items = $fetch_asdsadsada->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_items
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