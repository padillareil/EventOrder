<?php
require_once "../../../../config/connection_food.php";

$EventName = strtoupper($_POST['EventName']);
$Category = $_POST['Category'];
$PaxAmount = isset($_POST['PaxAmount']) ? trim($_POST['PaxAmount']) : 0;
$FoodCategory = isset($_POST['FoodCategory']) 
    ? json_decode($_POST['FoodCategory'], true) 
    : [];

try {

    $conn->beginTransaction();
    $fetch_pkgnum = $conn->prepare("EXEC dbo.[PackageCode]");
    $fetch_pkgnum->execute();
    $get_pkgnum = $fetch_pkgnum->fetch(PDO::FETCH_ASSOC);
    $PKGNumber = $get_pkgnum['PKGNumber'];

    if (!empty($FoodCategory)) {

        foreach ($FoodCategory as $itemmenu) {

            $Mid = $itemmenu['Mid'];
            $Qty = isset($itemmenu['Quantity']) ? $itemmenu['Quantity'] : 1;

            $ins_foods = $conn->prepare("EXEC dbo.[Create_PackageMenu] ?,?,?");
            $ins_foods->execute([
                $Mid,
                $PKGNumber,
                $Qty
            ]);
        }
    }

    $ins_header = $conn->prepare("EXEC dbo.[Create_Package] ?,?,?,?");
    $ins_header->execute([
        $EventName,
        $PKGNumber,
        $Category,
        $PaxAmount
    ]);

    $conn->commit();

    echo "OK";

} catch (PDOException $e) {

    $conn->rollback();

    echo "<b>Warning. Please Contact System Developer.<br/></b>" 
         . $e->getMessage();
}
?>