<?php
$success = "";

if(isset($_POST['save-text'])) {
    $welcome_text = mysqli_real_escape_string($connection, $_POST["welcome-text"]);
    
    mysqli_query($connection, "UPDATE home_page
    SET welcome_text='$welcome_text'");
    
    $success_1 = 'Första texten är uppdaterad!';
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

    <div class="flex-container">
      <div class="flex-center-center">
        <div class="grey-bg">
          <form method="post" action="">
            <h1 class="h1-white">redigera första sidans text</h1>
            <textarea name="welcome-text" cols="50" rows="10">
              <?php echo $welcome_txt; ?>
            </textarea>

            <div>
              <input type="submit" name="save-text" value="spara">
            </div>
          </form>
        </div>
        <?php
if(isset($success)) {
    echo $success;
} else {
    echo "";
}
?>
      </div>
    </div>