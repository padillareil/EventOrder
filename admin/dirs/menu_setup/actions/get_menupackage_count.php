<?php
require_once "../../../../config/connection_food.php";

try {

    $stmt = $conn->prepare("
        SELECT COUNT(DocEntry) AS TotalPackage
        FROM Event_Food_Package_H
    ");
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        "isSuccess" => "success",
        "Data" => $result
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "isSuccess" => "Failed",
        "Data" => "Error. Please contact system developer."
        // avoid exposing raw error in production
    ]);
}
?>