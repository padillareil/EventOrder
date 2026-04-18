<?php
require_once "../../../../config/connection_food.php";

try {

    // CATEGORY LIST
    $fetch_category = $conn->prepare("
        SELECT DISTINCT Category, Mid 
        FROM FoodMenu  
        ORDER BY Category
    ");
    $fetch_category->execute();
    $get_categories = $fetch_category->fetchAll(PDO::FETCH_ASSOC);

    // PACKAGE CODE
    $fetch_packagecode = $conn->prepare("EXEC dbo.[PackageCode]");
    $fetch_packagecode->execute();
    $get_code = $fetch_packagecode->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        "isSuccess" => "success",
        "Data" => $get_categories,
        "PackageCode" => $get_code ?? []
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "isSuccess" => "failed",
        "Data" => "<b>Error. Please Contact System Developer.</b><br>" . $e->getMessage()
    ]);
}
?>