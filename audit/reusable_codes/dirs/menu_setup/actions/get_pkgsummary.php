<?php
require_once "../../../../config/connection_food.php";

$DocEntry = $_POST['DocEntry'];

try {

    $conn->beginTransaction();

    $fetch_summary = $conn->prepare("EXEC dbo.[ViewVenue_PackageSummary] ?");
    $fetch_summary->execute([$DocEntry]);

    /* package header */
    $get_header = $fetch_summary->fetch(PDO::FETCH_ASSOC);

    $fetch_summary->nextRowset();

    /*pakcage menus */
    $get_foods = $fetch_summary->fetchAll(PDO::FETCH_ASSOC);

    $conn->commit();

    $response = array(
        "isSuccess" => 'success',
        "Header" => $get_header,
        "Foods" => $get_foods
    );

    echo json_encode($response);

} catch (PDOException $e) {

    $conn->rollback();

    $response = array(
        "isSuccess" => 'Failed',
        "Data" => "<b>Error. Please Contact System Developer.<br/></b>" . $e->getMessage()
    );

    echo json_encode($response);
}
?>