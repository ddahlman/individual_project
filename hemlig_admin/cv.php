<?php

$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabase);

$cv_ft_query = mysqli_query($connection,
"SELECT *
FROM cv_firsttext
WHERE id=1");

$cv_1gh_query = mysqli_query($connection,
"SELECT h.header, li.list_item
FROM cv_grey_headers AS h
INNER JOIN items AS li
ON h.headersID=li.headersID
WHERE h.headersID=1");

$cv_2gh_query = mysqli_query($connection,
"SELECT h.header, li.list_item
FROM cv_grey_headers AS h
INNER JOIN items AS li
ON h.headersID=li.headersID
WHERE h.headersID=2");

$cv_3gh_query = mysqli_query($connection,
"SELECT h.header, li.list_item
FROM cv_grey_headers AS h
INNER JOIN items AS li
ON h.headersID=li.headersID
WHERE h.headersID=3");


$cv_first_text = mysqli_fetch_assoc($cv_ft_query);
$cv_first_gh = mysqli_fetch_assoc($cv_1gh_query);
$cv_second_gh = mysqli_fetch_assoc($cv_2gh_query);
$cv_third_gh = mysqli_fetch_assoc($cv_3gh_query);

$first_text    = $cv_first_text["first_text"];
$first_header  = $cv_first_gh["header"];
$first_list    = $cv_first_gh["list_item"];
$second_header = $cv_second_gh["header"];
$second_list   = $cv_second_gh["list_item"];
$third_header  = $cv_third_gh["header"];
$third_list    = $cv_third_gh["list_item"];

if(isset($_POST['save'])) {
    $first_text = $_POST["first-text"];
    $first_list = $_POST["list-item"];
    
    mysqli_query($connection, "UPDATE cv_firsttext
    SET first_text='$first_text'
    WHERE id=1");
    
    mysqli_query($connection, "INSERT INTO items (list_item)
    VALUES '$first_list'
    WHERE headersID = 1");
    
    $success = 'CV är uppdatterat!';
}
?>
  <div class="grey-bg">
    <h1 class="h1-white">Redigera CV</h1>
  </div>
  <div class="flex-container">
    <div class="flex-center-center">
      <div class="grey-bg">
        <form method="post">
          <h1 class="h1-white">redigera första CV-texten</h1>
          <textarea name="first-text" id="first-text" cols="50" rows="10" placeholder="<?php echo $first_text; ?>"></textarea>
          <div>
            <input type="text" name="first-header" placeholder="">
            <ul id="first-list">
              <?php
while( $row = mysqli_fetch_assoc($cv_1gh_query)) {
    $list_item = $row['list_item'];
    ?>
                <li>
                  <input type="text" name="list-item" placeholder="<?php echo $list_item; ?>">
                </li>
                <?php
}
?>
            </ul>
          </div>
          <button id="addLi">Lägg till i listan</button>
          <div>
            <input type="submit" name="save" value="spara">
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