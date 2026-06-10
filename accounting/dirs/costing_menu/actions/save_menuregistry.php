<?php
require_once "../../../../config/connection.php";
require_once "../../../../config/functions.php";

session_start();

$User = $_SESSION['Uid'];

$Menucode    = trim($_POST['Menucode']);
$Menuname    = trim($_POST['Menuname']);
$Category    = trim($_POST['Category']);
$SubCat      = trim($_POST['SubCat']);
$Description = trim($_POST['Description']);

$Yield        = cleanDecimal($_POST['Yield']);
$SellingPrice = cleanDecimal($_POST['SellingPrice']);
$TotalCost    = cleanDecimal($_POST['TotalCost']);
$CostServing  = cleanDecimal($_POST['CostServing']);
$GrossProfit  = cleanDecimal($_POST['GrossProfit']);
$FoodCost     = cleanDecimal($_POST['FoodCost']);

$Ingredients = json_decode($_POST['Ingredients'], true);

try {

    $conn->beginTransaction();


    /*Validate Record of menu entry*/
    $validation = $conn->prepare("
        EXEC dbo.ValidateMenu_Entry ?,?,?,?
    ");

    $validation->execute([
        $User,
        $Menuname,
        $Category,
        $SubCat
    ]);

    $val = $validation->fetch(PDO::FETCH_ASSOC);

    $validation->closeCursor(); // IMPORTANT

    if ($val) {
        exit('This menu already exists. Please check your costing records if you need to make any modifications.');
    }



    $sql = "
        EXEC dbo.Menu_Registration
            ?,?,?,?,?,?,?,?,?,?,?,?
    ";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        $User,
        $Menucode,
        $Menuname,
        $Category,
        $SubCat,
        $Yield,
        $SellingPrice,
        $Description,
        $TotalCost,
        $CostServing,
        $GrossProfit,
        $FoodCost
    ]);

    if (!empty($Ingredients) && is_array($Ingredients)) {

        $sqlIngredient = "
            EXEC dbo.Menu_Ingredients
                ?,?,?,?,?,?
        ";

        $stmtIngredient = $conn->prepare($sqlIngredient);

        foreach ($Ingredients as $row) {

            $Ingredient = trim($row['item'] ?? '');

            if ($Ingredient == '') {
                continue;
            }

            $Qty        = cleanDecimal($row['qty'] ?? 0);
            $Unit       = trim($row['unit'] ?? '');
            $UnitCost   = cleanDecimal($row['cost'] ?? 0);
            $UnitAmount = cleanDecimal($row['amount'] ?? 0);

            $stmtIngredient->execute([
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