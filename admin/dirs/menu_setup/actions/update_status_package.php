<?php
    require_once "../../../../config/connection_food.php";

    $DocEntry = $_POST['DocEntry'];
    $Status  = $_POST['Status'];

    try {
        $conn->beginTransaction();
        $fetch_status = $conn->prepare("
            SELECT BuffStatus
            FROM Event_Food_Package_H 
            WHERE DocEntry = ?
        ");
        $fetch_status->execute([$DocEntry]);

        $currentStatus = $fetch_status->fetchColumn();
        if ($currentStatus === $Status) {
            echo "Package is already " . $currentStatus;
            exit;
        }
        $upd_status = $conn->prepare("
            UPDATE Event_Food_Package_H 
            SET BuffStatus = ? 
            WHERE DocEntry = ?
        ");
        $upd_status->execute([$Status, $DocEntry]);

        $conn->commit();
        echo "success";

    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
?>