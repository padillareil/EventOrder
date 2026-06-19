<?php
  require_once "../../../../config/connection.php";
  session_start();
  $User = $_SESSION['Uid'];
  $CurrentPage  = $_POST['CurrentPage'] ?? 1;
  $PageSize     = $_POST['PageSize'] ?? 20;
  $Search       = $_POST['Search'];
  $EntryDate       = $_POST['EntryDate'];
  $DocNum       = $_POST['DocNum'];
  $CustomerType       = $_POST['CustomerType'];
  $Transaction       = $_POST['Transaction'];
  $PaymentM       = $_POST['PaymentM'];


try {
  $conn->beginTransaction();

    $fetch_payments = $conn->prepare("EXEC dbo.[List_PaymentTransaction_Records] ?,?,?,?,?,?,?,?,?");
    $fetch_payments->execute([
      $User,
      $CurrentPage,
      $PageSize,
      $Search,
      $EntryDate,
      $DocNum,
      $CustomerType,
      $Transaction,
      $PaymentM
    ]);
    $get_paymentrecrords = $fetch_payments->fetchAll(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_paymentrecrords
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