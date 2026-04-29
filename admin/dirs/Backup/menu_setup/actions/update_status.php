    <?php
    require_once "../../../../config/connection_food.php";

    $LineNum = $_POST['LineNum'];
    $Status  = $_POST['Status'];

    try {
        $conn->beginTransaction();
        $fetch_status = $conn->prepare("
            SELECT DishStatus
            FROM FoodDish 
            WHERE LineNum = ?
        ");
        $fetch_status->execute([$LineNum]);

        $currentStatus = $fetch_status->fetchColumn();
        if ($currentStatus === $Status) {
            echo "Menu is already " . $currentStatus;
            exit;
        }
        $upd_status = $conn->prepare("
            UPDATE FoodDish 
            SET DishStatus = ? 
            WHERE LineNum = ?
        ");
        $upd_status->execute([$Status, $LineNum]);

        $conn->commit();
        echo "success";

    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
    ?>