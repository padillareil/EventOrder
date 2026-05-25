<?php
  require_once "../../../../config/connection_food.php";

  $DocEntry     = $_POST['DocEntry'];

try {
  $conn->beginTransaction();

    $fetch_header = $conn->prepare("
      SELECT 
        DocEntry,
        FoodPkg_Code,
        PackageName,
        EventType,
        PackageTier,
        RatePer_Pax,
        MaximumPax,
        MinimumPax,
        Description,
        PackageStatus,
        DocDate
      FROM FoodPackage_Header 
      WHERE DocEntry =?
    ");
    $fetch_header->execute([ $DocEntry ]);
    $get_header = $fetch_header->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_header
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