<?php
require_once "../../../config/connection.php";
session_start();

$User   = $_SESSION['Uid'];
$Search = $_POST['Search'];

try {

    $conn->beginTransaction();

    /* 1st result set - Events */
    $fetch_events = $conn->prepare("EXEC dbo.[HotelEvent_Calendar] ?, ?");
    $fetch_events->execute([$User, $Search]);
    $get_events = $fetch_events->fetchAll(PDO::FETCH_ASSOC);

    /* 2nd result set - Total Bookings */
    $fetch_events->nextRowset();
    $get_totalbooked = $fetch_events->fetch(PDO::FETCH_ASSOC);

    /* 3rd result set - Confirmed Bookings */
    $fetch_events->nextRowset();
    $get_confirmed = $fetch_events->fetch(PDO::FETCH_ASSOC);

    $conn->commit();

    $response = array(
        "isSuccess"   => "success",
        "Data"        => $get_events,
        "TotalBooked" => $get_totalbooked['TotalBookings'] ?? 0,
        "Confirmed"   => $get_confirmed['ConfirmedBookings'] ?? 0
    );

    echo json_encode($response);

} catch (PDOException $e) {

    $conn->rollback();

    $response = array(
        "isSuccess" => "Failed",
        "Data"      => "Error. Please Contact System Developer. <br/>" . $e->getMessage()
    );

    echo json_encode($response);
}
?>