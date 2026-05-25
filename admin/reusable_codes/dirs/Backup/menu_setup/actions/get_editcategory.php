<?php
  require_once "../../../../config/connection_food.php";

  $PackageCode     = $_POST['PackageCode'];

try {
  $conn->beginTransaction();

    $fetch_categories = $conn->prepare("
      SELECT 
       LineNum,
       VenPkg_Code,
       FoodGroup,
       SetupQty
      FROM VenuePackage_Food 
      WHERE VenPkg_Code =?
    ");
    $fetch_categories->execute([ $PackageCode ]);
    $get_categoriees = $fetch_categories->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_categoriees
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

