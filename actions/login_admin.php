<?php
if (!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')) {
    header("Location: ../login.php");
    exit;
}

session_start();
require_once '../config/connection.php';
require_once '../config/functions.php';

$Username = $_POST['Username'] ?? '';
$Password = $_POST['Password'] ?? '';

try {
    $stmt = $conn->prepare("EXEC dbo.[Session_Login_Admin] ?");
    $stmt->execute([$Username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && verify_password($Password, $user['Password'])) {
        $_SESSION['Aid'] = $user['Aid'];
        $_SESSION['Role'] = $user['Role'];
        $Remarks = 'Success';
        $response = ["response" => "OK", "role" => $user['Role']];
    } else {
        $Remarks = 'Failed';
        $response = ["response" => "ERROR", "message" => "Invalid username or password"];
    }

    echo json_encode($response);

} catch (PDOException $e) {
    echo json_encode([
        "response" => "ERROR",
        "message" => "Database error: " . $e->getMessage()
    ]);
}
?>
