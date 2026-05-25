<?php
    require_once "../../../../config/connection_food.php";

    $Custom_id = $_POST['Custom_id'];
    $Status  = $_POST['Status'];

    try {
        $conn->beginTransaction();
        $fetch_status = $conn->prepare("
            SELECT ItemStatus
            FROM CustomMenu 
            WHERE Custom_id = ?
        ");
        $fetch_status->execute([$Custom_id]);

        $currentStatus = $fetch_status->fetchColumn();
        if ($currentStatus === $Status) {
            echo "Package is already " . $currentStatus;
            exit;
        }
        $upd_status = $conn->prepare("
            UPDATE CustomMenu 
            SET ItemStatus = ? 
            WHERE Custom_id = ?
        ");
        $upd_status->execute([$Status, $Custom_id]);

        $conn->commit();
        echo "success";

    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
?>