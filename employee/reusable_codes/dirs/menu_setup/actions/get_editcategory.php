<?php
  require_once "../../../../config/connection_food.php";

  $FoodPkg_Code     = $_POST['FoodPkg_Code'];

try {
  $conn->beginTransaction();

    $fetch_categories = $conn->prepare("
      SELECT 
       LineNum,
       FoodPkg_Code,
       FoodGroup,
       SetupQty
      FROM FoodPackage_Items 
      WHERE FoodPkg_Code =?
    ");
    $fetch_categories->execute([ $FoodPkg_Code ]);
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

