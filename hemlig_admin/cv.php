<?php

$success_1 = "";
$success_2 = "";
$success_3 = "";

/*when clicking on spara below text================*/
if(isset($_POST['save-text'])) {
    $first_text = $_POST["first-text"];
    
    mysqli_query($connection, "UPDATE cv_firsttext
    SET first_text='$first_text'
    WHERE id=1");
    
    $success_1 = 'Första texten är uppdaterad!';
}

/*when clicking on spara rubrik================*/
if(isset($_POST['save-1st-header'])) {
    $first_header = $_POST["first-header"];
    
    mysqli_query($connection, "UPDATE cv_grey_headers
    SET header='$first_header'
    WHERE headersID = 1");
    
    $success_2 = 'Första rubriken är uppdaterad!';
}

/*when clicking on spara tillägg================*/
if(isset($_POST['add-1st-list'])) {
    
    $add_to_list = $_POST["add-to-list"];
    
    $result3 = mysqli_query($connection, "INSERT INTO items (headersID, list_item)
    VALUES ('1', '$add_to_list')");
    if($result3) {
        $success_3 = 'Första listan är uppdaterad!';
    } else {
        $success_3 = 'Error';
    }
}

/*when clicking on ändra================*/
if(isset($_POST['list1-id'])) {
    $list_item1 = $_POST["list-item1"];
    $list1_id = $_POST["list1-id"];
    
    $update = mysqli_query($connection, "UPDATE items
    SET list_item='$list_item1'
    WHERE id = '$list1_id'");
    if($update) {
        $success_3 = 'Första listan är uppdaterad!';
    } else {
        $success_3 = 'Error';
    }
    
}
?>



  <?php
/*--update first text===================================*/
$cv_ft_query = mysqli_query($connection,
"SELECT *
FROM cv_firsttext
WHERE id=1");

$cv_first_text = mysqli_fetch_assoc($cv_ft_query);

$first_text    = $cv_first_text['first_text'];
?>
    <div class="grey-bg">
      <h1 class="h1-white">Redigera CV</h1>
    </div>

    <div class="flex-container">
      <div class="flex-center-center">
        <div class="grey-bg">
          <form method="post" action="">
            <h1 class="h1-white">redigera första CV-texten</h1>
            <textarea name="first-text" id="first-text" cols="50" rows="10">
              <?php echo $first_text; ?>
            </textarea>

            <div>
              <input type="submit" name="save-text" value="spara">
            </div>
          </form>
        </div>
        <?php
if(isset($success_1)) {
    echo $success_1;
} else {
    echo "";
}
?>
      </div>
    </div>


    <?php
/*update first header================*/
$cv_1gh_query = mysqli_query($connection,
"SELECT header
FROM cv_grey_headers
WHERE headersID=1");

$cv_first_header = mysqli_fetch_assoc($cv_1gh_query);
$first_header  = $cv_first_header['header'];
?>

      <div class="flex-container">
        <div class="flex-center-center">
          <div class="grey-bg">
            <form method="post" action="">
              <h1 class="h1-white">Redigera första rubriken</h1>
              <input type="text" name="first-header" value="<?php echo $first_header; ?>">
              <input type="submit" name="save-1st-header" value="spara rubrik">
            </form>
            <?php
if(isset($success_2)) {
    echo $success_2;
} else {
    echo "";
}


/*insert to and update first list========================*/
$cv_1list_query = mysqli_query($connection,
"SELECT id, list_item
FROM items
WHERE headersID=1");
?>


              <h1 class="h1-white">Redigera listan</h1>
              <ul id="first-list">
                <?php
while( $row = mysqli_fetch_assoc($cv_1list_query)) {
    $list_item = $row['list_item'];
    $id = $row['id'];
    ?>
                  <li>
                    <form method="post" action="">
                      <input type="hidden" name="list1-id" value="<?php echo $id; ?>">
                      <input type="text" name="list-item1" value="<?php echo $list_item; ?>">
                      <input type="submit" name="" value="ändra">
                    </form>
                  </li>
                  <?php
}
?>
              </ul>
              <form method="post" action="">
                <h1 class="h1-white">Lägg till i listan</h1>
                <input type="text" name="add-to-list" placeholder="Lägg till i listan">
                <input type="submit" name="add-1st-list" value="spara tillägg">
              </form>
          </div>
          <?php
if(isset($success_3)) {
    echo $success_3;
} else {
    echo "";
}
?>
        </div>
      </div>