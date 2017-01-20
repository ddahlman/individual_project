<?php

$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabase);

$query1 = mysqli_query($connection, "SELECT * FROM cv_firsttext WHERE id=1");

$cv_first_text = mysqli_fetch_assoc($query1);

$first_text = $cv_first_text["first_text"];

if(isset($_POST['save'])) {
    $first_text = $_POST["first-text"];
    
    mysqli_query($connection, "UPDATE cv_firsttext
    SET first_text='$first_text'
    WHERE id=1");
    
    $success = 'CV är uppdatterat!';
}
?>
  <div class="flex-container">
    <div class="flex-center-center">
      <div class="grey-bg">
        <form method="post">
          <textarea name="first-text" id="first-text" cols="30" rows="10" placeholder="<?php echo $first_text; ?>"></textarea>
          <input type="submit" name="save" value="spara">
        </form>
      </div>
    </div>
  </div>