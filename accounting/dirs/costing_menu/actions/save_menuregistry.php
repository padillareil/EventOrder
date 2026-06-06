<?php
require_once "../../../../config/connection.php";
session_start();

$User = $_SESSION['Uid'];

/* =========================
   HEADER VALUES
========================= */
$Menucode      = $_POST['Menucode'];
$Menuname      = $_POST['Menuname'];
$Category      = $_POST['Category'];
$SubCat        = $_POST['SubCat'];
$Yield         = $_POST['Yield'];
$SellingPrice  = $_POST['SellingPrice'];
$Description   = $_POST['Description'];
$TotalCost     = $_POST['TotalCost'];
$CostServing   = $_POST['CostServing'];
$GrossProfit   = $_POST['GrossProfit'];
$FoodCost      = $_POST['FoodCost'];

/* =========================
   INGREDIENTS (JSON)
========================= */
$Ingredients = json_decode($_POST['Ingredients'], true);

try {

    $conn->beginTransaction();

    /* =========================
       1. INSERT MENU HEADER
    ========================= */
    // $ins_menu = $conn->prepare("
    //     EXEC dbo.[Menu_Registration] 
    //     ?,?,?,?,?,?,?,?,?,?,?,?
    // ");

    // $ins_menu->execute([
    //     $User,
    //     $Menucode,
    //     $Menuname,
    //     $Category,
    //     $SubCat,
    //     $Yield,
    //     $SellingPrice,
    //     $Description,
    //     $TotalCost,
    //     $CostServing,
    //     $GrossProfit,
    //     $FoodCost
    // ]);

    /* =========================
       2. INSERT INGREDIENTS
    ========================= */
    if (!empty($Ingredients)) {

        foreach ($Ingredients as $row) {

            $Ingredient = $row['item'] ?? '';
            $Qty        = $row['qty'] ?? 0;
            $Unit       = $row['unit'] ?? '';
            $UnitCost   = $row['cost'] ?? 0;
            $UnitAmount = $row['amount'] ?? 0;

            if ($Ingredient == '') {
                continue; // skip empty rows
            }

            $ins_costing = $conn->prepare("
                EXEC dbo.[Menu_Ingredients] ?,?,?,?,?,?
            ");

            $ins_costing->execute([
                $Menucode,
                $Ingredient,
                $Qty,
                $Unit,
                $UnitCost,
                $UnitAmount
            ]);
        }
    }

    $conn->commit();

    echo "OK";

} catch (PDOException $e) {

    $conn->rollback();

    echo "Error: " . $e->getMessage();
}
?>