<?php
  require_once "../../../../config/connection_food.php";

try {
  $conn->beginTransaction();

    $fetch_category = $conn->prepare("
      SELECT Category
      FROM InclusionCategory
      GROUP BY Category
      ORDER BY Category
    ");
    $fetch_category->execute();
    $get_category = $fetch_category->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_category
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