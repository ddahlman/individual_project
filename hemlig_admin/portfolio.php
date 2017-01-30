<?php

$success_1 = "";
$success_2 = "";

/*when clicking on ändra below redigera url-adress================*/
if(isset($_POST['txt-url-id'])) {
    $url = mysqli_real_escape_string($connection, $_POST["url"]);
    $txt_url_id = mysqli_real_escape_string($connection, $_POST["txt-url-id"]);
    $proj_text = mysqli_real_escape_string($connection, $_POST["project-text"]);
    
    $update = mysqli_query($connection, "UPDATE project_url
    SET url='$url', project_text='$proj_text'
    WHERE id = '$txt_url_id'");
    if($update) {
        $success_1 = 'url-listan är uppdaterad!';
    } else {
        $success_1 = 'Error';
    }
    
}


/*when clicking on  spara tillägg (url)================*/
if(isset($_POST['add-items'])) {
    
    $add_to_list = mysqli_real_escape_string($connection, $_POST["add-to-list"]);
    $add_proj = mysqli_real_escape_string($connection, $_POST["add-proj-text"]);
    
    $result = mysqli_query($connection, "INSERT INTO project_url (url, project_text)
    VALUES ('$add_to_list', '$add_proj')");
    if($result) {
        $success_2 = 'Listan är uppdaterad!';
    } else {
        $success_2 = 'Error';
    }
}


?>
  <!--************** elements ************************-->
  <?php
$my_work = mysqli_query($connection,
"SELECT *
FROM project_url");
?>
    <div class="flex-container">
      <?php
while($row = mysqli_fetch_assoc($my_work)) {
    $project_url = $row['url'];
    $project_text = $row['project_text'];
    $id = $row['id'];
    ?>
        <!--Uppdatera url ===================================-->
        <div class="grey-bg">
          <form method="post" action="">
            <h1 class="h1-white">Redigera URL-adress</h1>
            <ul>
              <li>
                <input type="text" name="url" value="<?php echo $project_url; ?>">
              </li>
            </ul>
            <!--Uppdatera projekt text================-->
            <h1 class="h1-white">redigera projekttexten</h1>
            <input type="hidden" name="txt-url-id" value="<?php echo $id; ?>">
            <textarea name="project-text" cols="50" rows="10">
              <?php echo $project_text; ?>
            </textarea>
            <div>
              <input type="submit" name="save-pro-text" value="ändra">
            </div>
          </form>
        </div>
        <?php
}
?>
          <?php
if(isset($success_1)) {
    echo $success_1;
} else {
    echo "";
}
?>
    </div>


    <!--**************** lägg till url ***************-->
    <div class="flex-container">
      <div class="grey-bg">
        <form method="post" action="">
          <h1 class="h1-white">Lägg till projekt url</h1>
          <input type="text" name="add-to-list" placeholder="Lägg till en url">
          <!--************* lägg till projekttext *************-->
          <h1 class="h1-white">Lägg till text</h1>
          <textarea name="add-proj-text" cols="50" rows="10"> </textarea>
          <div>
            <input type="submit" name="add-items" value="spara tillägg">
          </div>
        </form>
        <?php
if(isset($success_2)) {
    echo $success_2;
} else {
    echo "";
}
?>
      </div>
    </div>