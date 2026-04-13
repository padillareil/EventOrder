<?php
require_once "../config/connection.php";
require_once "../config/functions.php";
session_start();
$Userid = $_SESSION['Aid']; 
session_destroy();
echo "OK";
?>
