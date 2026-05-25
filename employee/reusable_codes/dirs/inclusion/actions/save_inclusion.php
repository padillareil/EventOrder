<?php
require_once "../../../../config/connection_food.php";

$Description = $_POST['Description'];
$Type = $_POST['Type'];
$Category = $_POST['Category'];
$Quantity = $_POST['Quantity'] ?? 0;
$Price = isset($_POST['Price']) ? trim($_POST['Price']) : 0;


try {

    $conn->beginTransaction();

    /* ✅ 1. Validate Event Name */
    $validate_inclusion = $conn->prepare("
        SELECT COUNT(LineNum)
        FROM EventInclusion 
        WHERE InclusionDescription = ?
    ");
    $validate_inclusion->execute([$Description]);

    if ($validate_inclusion->fetchColumn() > 0) {
        throw new Exception('This inclusion already exists.');
    }

    $fetch_inlusioncode = $conn->prepare("EXEC dbo.[InclusionCode]");
    $fetch_inlusioncode->execute();
    $get_inclsioncode = $fetch_inlusioncode->fetch(PDO::FETCH_ASSOC);
    $InclusionCode = $get_inclsioncode['InclusionCode'];


    $ins_header = $conn->prepare("EXEC dbo.[Create_EventIclusion] ?,?,?,?,?,?");
    $ins_header->execute([
        $InclusionCode,
        $Description,
        $Type,
        $Category,
        $Quantity,
        $Price
    ]);

    $conn->commit();

    echo "OK"; 
} catch (Exception $e) {

    $conn->rollback();

    echo $e->getMessage();
}
?>