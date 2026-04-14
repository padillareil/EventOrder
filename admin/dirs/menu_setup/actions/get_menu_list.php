<?php
require_once "../../../../config/connection_food.php";

$CurrentPage  = $_POST['CurrentPage'] ?? 1;
$PageSize     = $_POST['PageSize'] ?? 4;
$Search       = $_POST['Search'] ?? '';
$Filter       = $_POST['Filter'] ?? '';

try {
    $conn->beginTransaction();

    // 1. Get Categories
    $fetch_menus = $conn->prepare("
        SELECT Category 
        FROM FoodMenu 
        GROUP BY Category 
        ORDER BY Category
    ");
    $fetch_menus->execute();
    $FoodGroup = $fetch_menus->fetchAll(PDO::FETCH_ASSOC);

    $finalData = []; // ✅ store grouped result

    // 2. Loop categories
    foreach ($FoodGroup as $categoryRow) {

        $category = $categoryRow['Category'];

        // 3. Get dishes per category
        $fetch_dish = $conn->prepare("
            EXEC dbo.[Pagination_FoodMenu_List] ?, ?, ?, ?
        ");

        // pass category as filter 👇
        $fetch_dish->execute([
            $CurrentPage,
            $PageSize,
            $Search,
            $category
        ]);

        $dishes = $fetch_dish->fetchAll(PDO::FETCH_ASSOC);

        // 4. Store grouped data
        $finalData[] = [
            "Category" => $category,
            "Dishes"   => $dishes
        ];
    }

    $conn->commit();

    echo json_encode([
        "isSuccess" => "success",
        "Data" => $finalData
    ]);

} catch (PDOException $e) {
    $conn->rollback();

    echo json_encode([
        "isSuccess" => "Failed",
        "Data" => $e->getMessage()
    ]);
}
?>