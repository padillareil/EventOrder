<?php
require_once "../../../../config/connection.php";
require_once "../../../../config/functions.php";

$Username  = $_POST['Username'];
$Password  = hash_password($_POST['Password']);
$Fullname  = $_POST['Fullname'];
$Position  = $_POST['Position'];
$Role      = $_POST['Role'];

try {
    $conn->beginTransaction();

    if ($Role == 'Admin') {

        // Validate duplicate
        $validate_entry = $conn->prepare("
            SELECT COUNT(*) 
            FROM SysAdmin 
            WHERE Username = ? AND Fullname = ?
        ");
        $validate_entry->execute([$Username, $Fullname]);

        if ($validate_entry->fetchColumn() > 0) {
            $conn->rollBack();
            exit('This account already exists.');
        }

        // Generate Admin Code
        $fetch_usercode = $conn->prepare("EXEC dbo.[AdminCode]");
        $fetch_usercode->execute();
        $get_code = $fetch_usercode->fetch(PDO::FETCH_ASSOC);
        $AdminCode = $get_code['UserCode'];

        // Insert Admin
        $ins_accountadmin = $conn->prepare("EXEC dbo.[CreatAccount_Admin] ?,?,?,?,?");

        $ins_accountadmin->execute([
            $AdminCode,
            $Username,
            $Password,
            $Fullname,
            $Role
        ]);

    } else {

        // Validate duplicate
        $validate_entry = $conn->prepare("
            SELECT COUNT(*) 
            FROM SysAccount 
            WHERE Username = ? AND Fullname = ?
        ");
        $validate_entry->execute([$Username, $Fullname]);

        if ($validate_entry->fetchColumn() > 0) {
            $conn->rollBack();
            exit('This account already exists.');
        }

        // Generate User Code
        $fetch_usercode = $conn->prepare("EXEC dbo.[UserCode]");
        $fetch_usercode->execute();
        $get_code = $fetch_usercode->fetch(PDO::FETCH_ASSOC);
        $UserCode = $get_code['UserCode'];

        // Insert User
        $ins_saveaccount = $conn->prepare("EXEC dbo.[CreatAccount_Normal] ?,?,?,?,?,?");

        $ins_saveaccount->execute([
            $UserCode,
            $Username,
            $Password,
            $Fullname,
            $Position,
            $Role
        ]);
    }

    $conn->commit();
    echo "OK";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "<b>Warning. Please Contact System Developer.<br/></b>" . $e->getMessage();
}
?>