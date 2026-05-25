<?php
  require_once "../../../config/connection.php";
  session_start();

  $User     = $_SESSION['Uid'];

try {
  $conn->beginTransaction();

    $get_userinfo = $conn->prepare("EXEC dbo.[ReviewProfilePicture] ?");
    $get_userinfo->execute([ $User ]);
    $get_info = $get_userinfo->fetch(PDO::FETCH_ASSOC);


    if ($get_info && isset($get_info['AccProfile'])) {
        // convert binary to base64
        $get_info['AccProfile'] = base64_encode($get_info['AccProfile']);
    }


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

