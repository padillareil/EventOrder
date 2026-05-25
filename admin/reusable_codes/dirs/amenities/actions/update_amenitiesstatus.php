<?php
    require_once "../../../../config/connection.php";

    $Vid = $_POST['Vid'];
    $Status  = $_POST['Status'];

    try {
        $conn->beginTransaction();
        $fetch_status = $conn->prepare("
            SELECT ItemStatus
            FROM VenuePolicy 
            WHERE Vid = ?
        ");
        $fetch_status->execute([$Vid]);

        $currentStatus = $fetch_status->fetchColumn();
        if ($currentStatus === $Status) {
            echo "Package is already " . $currentStatus;
            exit;
        }
        $upd_status = $conn->prepare("
            UPDATE VenuePolicy 
            SET ItemStatus = ? 
            WHERE Vid = ?
        ");
        $upd_status->execute([$Status, $Vid]);

        $conn->commit();
        echo "success";

    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
?>