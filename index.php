<?php include_once('./includes/header.php');
include('./hemlig_admin/config.php');

$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabase);
?>
  <div id="easterEgg">
    <!-- modal-->
    <div id="theModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="closeModal">&times;</span>
          <h2 class="modal-h2"></h2>
        </div>
        <div class="modal-body">
          <p class="winOrLoose1">khclehbwl</p>
          <p class="winOrLoose2">ncwecbb</p>
        </div>
        <div class="modal-footer">
          <button class="btn-again" type="">Kör en gång till</button>
          <button class="btn-backhome" type="">Tillbaka till hemsidan</button>
        </div>
      </div>
    </div>
    <!-- modal end -->
    <h1 class="hangman-text">H A N G M A N</h1>
    <h2 class="hangman-text" id="lives"></h2>
    <div class="wrong"></div>
    <div id="undefinedChar"></div>
    <div class="hangflex-container">
      <div class="hangman-container">
        <div id="theman-container">
          <div id="embracer">
          </div>
          <div id="rope">
          </div>
          <div id="head">
            <div id="face">
              <p> <strong>x x </strong></p>
            </div>
          </div>
          <div id="h-body">
          </div>
          <div id="arms">
          </div>
          <div id="legs">
          </div>
        </div>
        <div id="platform">
        </div>
      </div>
      <span id="alreadyPressed"></span>
      <div class="letters-to-fill">
      </div>
    </div>
  </div>
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