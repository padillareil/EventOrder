<?php
    require_once "../../../../config/connection_food.php";

    $LineNum = $_POST['LineNum'];
    $Status  = $_POST['Status'];

    try {
        $conn->beginTransaction();
        $fetch_status = $conn->prepare("
            SELECT DocStatus
            FROM EventInclusion 
            WHERE LineNum = ?
        ");
        $fetch_status->execute([$LineNum]);

        $currentStatus = $fetch_status->fetchColumn();
        if ($currentStatus === $Status) {
            echo "Package is already " . $currentStatus;
            exit;
        }
        $upd_status = $conn->prepare("
            UPDATE EventInclusion 
            SET DocStatus = ? 
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