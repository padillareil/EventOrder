<?php
  require_once "../../../../config/connection.php";

  $DocEntry     = $_POST['DocEntry'];

try {
  $conn->beginTransaction();

    $fetch_maindetails = $conn->prepare("EXEC Get_MenuDetails ?");
    $fetch_maindetails->execute([ $DocEntry ]);
    $get_data = $fetch_maindetails->fetch(PDO::FETCH_ASSOC);



    $fetch_maindetails->nextRowset();
    $ingredients = $fetch_maindetails->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_data,
    "Ingredients" => $ingredients
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