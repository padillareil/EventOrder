<?php

require_once "../../../../../../config/connection_config.php";

$StandardCurrentPage = $_POST['StandardCurrentPage'] ?? 1;
$StandardPageSize    = $_POST['StandardPageSize'] ?? 1;
$Search              = $_POST['Search'] ?? '';
$Tier                = 'Standard';

try {

    $conn->beginTransaction();

    $stmt = $conn->prepare("
        EXEC dbo.[FoodPackage_Pagination] ?, ?, ?, ?
    ");

    $stmt->execute([
        $StandardCurrentPage,
        $StandardPageSize,
        $Search,
        $Tier
    ]);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $conn->commit();

    echo json_encode([
        "isSuccess" => "success",
        "Data" => $data
    ]);

} catch (PDOException $e) {

    $conn->rollback();

    echo json_encode([
        "isSuccess" => "failed",
        "Data" => $e->getMessage()
    ]);

}
?>