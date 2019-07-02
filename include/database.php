<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

ini_set('display_errors', 1); 
error_reporting(E_ALL);

$host = "localhost";
$data = "asomi";
$user = "root";
$pass = "";
$conn = mysqli_connect($host, $user, $pass) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_set_charset($conn,"utf8");

?>
