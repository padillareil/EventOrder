<?php
  require_once "../../../../config/connection_food.php";

  $LineNum     = $_POST['LineNum'];
  $response    = array();

try {
  $conn->beginTransaction();

    $fetch_inclusiondata = $conn->prepare("
      SELECT
        LineNum,
        InclusionCode,
        InclusionType,
        Category,
        InclusionPrice,
        InclusionDescription,
        Quantity,
        DocStatus,
        DocDate
      FROM EventInclusion
      WHERE LineNum = ?
    ");
    $fetch_inclusiondata->execute([ $LineNum ]);
    $get_info = $fetch_inclusiondata->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_info
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


