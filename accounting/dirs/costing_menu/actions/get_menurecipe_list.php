<?php
  require_once "../../../../config/connection.php";
  session_start();
  $User = $_SESSION['Uid'];
  $CurrentPageMenu  = $_POST['CurrentPageMenu'] ?? 1;
  $PageSizeMenu     = $_POST['PageSizeMenu'] ?? 20;
  $SearchMenu       = $_POST['SearchMenu'];
  
try {
  $conn->beginTransaction();

    $fetch_menus = $conn->prepare("EXEC MenuRecipe_List ?,?,?,?");
    $fetch_menus->execute([$User,$CurrentPageMenu,$PageSizeMenu,$SearchMenu]);
    $get_menus = $fetch_menus->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_menus
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