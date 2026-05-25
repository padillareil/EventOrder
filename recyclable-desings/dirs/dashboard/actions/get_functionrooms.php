<?php
require_once "../../../config/connection.php";

header('Content-Type: application/json');

try {
    $conn->beginTransaction();
    $fetch_functions = $conn->prepare("EXEC dbo.[FunctionRoom_List]");
    $fetch_functions->execute();
    $raw_data = $fetch_functions->fetchAll(PDO::FETCH_ASSOC);

    $conn->commit();
    $grouped_rooms = [];
    foreach ($raw_data as $row) {
        $motherName = $row['FunctionName'];
        if (!isset($grouped_rooms[$motherName])) {
            $grouped_rooms[$motherName] = [
                "mother_name" => $motherName,
                "floor" => $row['FloorLevel'],
                "wing" => $row['HotelWing'],
                "children" => []
            ];
        }
        $grouped_rooms[$motherName]['children'][] = [
            "line_num" => $row['LineNum'],
            "room_name" => $row['RoomName'],
            "capacity" => $row['MaxCapacity'],
            "uom" => $row['Uom'],
            "rental_fee" => $row['RentalFee']
        ];
    }
    $final_data = array_values($grouped_rooms);
    echo json_encode([
        "isSuccess" => 'success',
        "Data" => $final_data
    ]);

} catch (PDOException $e) {
    if ($conn->inTransaction()) {
        $conn->rollback();
    }
    echo json_encode([
        "isSuccess" => 'Failed',
        "Data" => "Error: " . $e->getMessage()
    ]);
}
?>