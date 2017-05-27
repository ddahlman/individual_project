<?php
include('admin_meny.php');
include('modal.php');
?>

  <?php
$page = isset($_GET['page']) ? $_GET['page'] : "";

switch ($page) {
    case 'home':
        include_once("home.php");
        break;
    
    case 'home_admin':
        include_once("home_admin.php");
        break;
    
    case 'cv':
        include_once("cv.php");
        break;
    
    case 'about':
        include_once("about.php");
        break;
    
    case 'portfolio':
        include_once("portfolio.php");
        break;
    
    case 'incoming_msg':
        include_once("incoming_msg.php");
        break;
    
    default:
        include ('home.php');
        break;
}
?>

    <?php
include('admin_footer.php');
?>