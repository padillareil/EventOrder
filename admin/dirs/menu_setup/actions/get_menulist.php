<?php
require_once "../../../../config/connection_food.php";

$Filter = $_POST['Filter'] ?? '';
$Search = $_POST['Search'] ?? '';

try {

    $fetch_menus = $conn->prepare("EXEC dbo.[Food_Menu_List] ?, ?");
    $fetch_menus->execute([$Search, $Filter]);

    $get_foods = $fetch_menus->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "isSuccess" => "success",
        "Data" => $get_foods
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "isSuccess" => "Failed",
        "Data" => $e->getMessage()
    ]);
}
?>