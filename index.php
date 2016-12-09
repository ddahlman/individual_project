<?php include_once('./includes/header.php');?>

  <?php
$page = isset($_GET['page']) ? $_GET['page'] : "";

switch ($page) {
    case 'home':
        include_once("home.php");
        break;
    
    case 'resume':
        include_once("resume.php");
        break;
    
    case 'about':
        include_once("about.php");
        break;
    
    default:
        include ('home.php');
        break;
}
?>

    <?php
include('./includes/footer.php');
?>