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


$LaborCost    = cleanDecimal($_POST['LaborCost'] ?? 0);
$CostServing    = cleanDecimal($_POST['CostServing'] ?? 0);
$VAT    = $_POST['VAT'] ?? 0;
$Discounted      = cleanDecimal($_POST['Discounted'] ?? 0);
$DiscountedPrice = cleanDecimal($_POST['DiscountedPrice'] ?? 0);
$FinalPrice = cleanDecimal($_POST['FinalPrice'] ?? 0);
$PrepHrs = $_POST['PrepHrs'] ?? 0;
$PrepMins = $_POST['PrepMins'] ?? 0;
$CookHrs = $_POST['CookHrs'] ?? 0;
$CookMins = $_POST['CookMins'] ?? 0;


$Yield        = cleanDecimal($_POST['Yield'] ?? 0);
$SellingPrice = cleanDecimal($_POST['SellingPrice'] ?? 0);
$TotalCost    = cleanDecimal($_POST['TotalCost'] ?? 0);
$CostServing  = cleanDecimal($_POST['CostServing'] ?? 0);
$GrossProfit  = cleanDecimal($_POST['GrossProfit'] ?? 0);
$FoodCost     = cleanDecimal($_POST['FoodCost'] ?? 0);

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
        EXEC Menu_Registration
            ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
    ";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        $User,
        $Menucode,
        $Menuname,
        $Category,
        $SubCat,
        $Yield,
        $Description,
        $TotalCost,
        $CostServing,
        $GrossProfit,
        $FoodCost,
        $PrepHrs,
        $PrepMins,
        $CookHrs,
        $CookMins,
        $SellingPrice,
        $LaborCost,
        $VAT,
        $Discounted,
        $FinalPrice
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