<?php
$dbusername = "219307_ot65650";
$dbhost = "danieldahlman-219307.mysql.binero.se";
$dbpassword = "Leinad0243";
$db = "219307-danieldahlman";
header('Content-Type: application/json');
/*header('Access-Control-Allow-Methods: GET, POST, PUT');*/


$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $db);
mysqli_query($connection, "SET NAMES utf8");
?>