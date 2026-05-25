<?php
  require_once "../../../../config/connection.php";
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSize     = $_POST['PageSize'] ?? 20;
  $Search       = $_POST['Search'];

try {
  $conn->beginTransaction();

    $fetch_amenities = $conn->prepare("EXEC dbo.[Amenities_Pagination] ?,?,?");
    $fetch_amenities->execute([$CurrentPage,$PageSize,$Search]);
    $get_amenties = $fetch_amenities->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_amenties
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