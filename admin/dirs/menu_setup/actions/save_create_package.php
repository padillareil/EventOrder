<?php
require_once "../../../../config/connection_food.php";

$EventName = $_POST['EventName'];
$EngagerCategory = $_POST['EngagerCategory'];
$PaxAmount = isset($_POST['PaxAmount']) ? trim($_POST['PaxAmount']) : 0;
$Inclusion = $_POST['Inclusion'];
$PaymentArrangement = $_POST['PaymentArrangement'];
$Note = $_POST['Note'];
$Menus = $_POST['Menus'] ?? [];

try {

    $conn->beginTransaction();

    $fetch_pkgnum = $conn->prepare("EXEC dbo.[FoodPkg_Numbercode]");
    $fetch_pkgnum->execute();
    $get_pkgnum = $fetch_pkgnum->fetch(PDO::FETCH_ASSOC);

    $PKGNumber = $get_pkgnum['PKGNumber'];

   

    if (!empty($Menus)) {

        foreach ($Menus as $itemmenu) {

            $ins_foods = $conn->prepare("EXEC dbo.[Create_FoodMenuLists] ?,?");
            $ins_foods->execute([
                $itemmenu,  
                $PKGNumber   
            ]);
        }
    }

    $ins_header = $conn->prepare("EXEC dbo.[Create_FoodPackageHeader] ?,?,?,?,?,?,?");
    $ins_header->execute([
        $EventName,
        $PKGNumber,
        $EngagerCategory,
        $PaxAmount,
        $Inclusion,
        $PaymentArrangement,
        $Note
    ]);

    $conn->commit();
    echo "OK";

} catch (PDOException $e) {

    $conn->rollback();

    echo "<b>Warning. Please Contact System Developer.<br/></b>" 
         . $e->getMessage();
}
?>