<?php
  require_once "../../../../config/connection.php";
  session_start();
  $User = $_SESSION['Uid'];
  $CurrentPageIng  = $_POST['CurrentPageIng'] ?? 1;
  $PageSizeing     = $_POST['PageSizeing'] ?? 20;
  $Searching       = $_POST['Searching'];
  
try {
  $conn->beginTransaction();

    $fetch_ingredeitns = $conn->prepare("EXEC dbo.[Ingredients_List] ?,?,?,?");
    $fetch_ingredeitns->execute([$User,$CurrentPageIng,$PageSizeing,$Searching]);
    $get_ingredients = $fetch_ingredeitns->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_ingredients
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