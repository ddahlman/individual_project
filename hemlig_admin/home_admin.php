<?php
$success = "";

if(isset($_POST['save-text'])) {
    $welcome_text = mysqli_real_escape_string($connection, $_POST["welcome-text"]);
    
    mysqli_query($connection, "UPDATE home_page
    SET welcome_text='$welcome_text'");
    
    $success = 'Första texten är uppdaterad!';
}
?>

  <?php
/*--update welcome text===================================*/
$query = mysqli_query($connection,
"SELECT *
FROM home_page");

$welcome = mysqli_fetch_assoc($query);
$welcome_txt = $welcome['welcome_text'];
?>

    <div class="dark-bg">
      <h1 class="h1-white">Redigera Första sidan</h1>
    </div>
 <?php
if(isset($success)) {
    echo "<div class='bg-success'>
            <div class='text-center'><strong>$success</strong></div>
          </div>";
} else {
    echo "";
}
?>
    <div class="container">
      <div class="row">
        <div class="white-bg">
          <form method="post" action="">
            <div class='form-group row'>
              <div class='col-md-8'>
                 <label class="control-label">Redigera första sidans text</label>
                  <textarea class='form-control' name="welcome-text" rows="10">
                    <?php echo $welcome_txt; ?>
                  </textarea>
              </div>
            </div>
            <div class='form-group'>
              <input type="submit" class='btn btn-info' name="save-text" value="spara">
            </div>
          </form>
        </div>
      </div>
    </div>