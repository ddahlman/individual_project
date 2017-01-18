<?php
include('config.php');
session_start();
$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabase);
$user_check = $_SESSION['login_user'];
$session_sql = mysqli_query($connection, "SELECT username FROM login WHERE username = '$user_check'");
$row = mysqli_fetch_assoc($session_sql);
$login_session = $row['username'];

if(!isset($login_session)) {
    mysqli_close($connection);
    header('Location: index.php');
}
?>