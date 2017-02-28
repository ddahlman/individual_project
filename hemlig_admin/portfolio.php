<?php


/*when clicking on ändra below redigera url-adress================*/
if(isset($_POST['txt-url-id'])) {
    $url = mysqli_real_escape_string($connection, $_POST["url"]);
    $txt_url_id = mysqli_real_escape_string($connection, $_POST["txt-url-id"]);
    $proj_text = mysqli_real_escape_string($connection, $_POST["project-text"]);
    
    $update = mysqli_query($connection, "UPDATE project_url
    SET url='$url', project_text='$proj_text'
    WHERE id = '$txt_url_id'");
    if($update) {
        $success = 'url-listan är uppdaterad!';
    } else {
        $success = 'Error';
    }
    
}


/*when clicking on  spara tillägg (url)================*/
if(isset($_POST['add-items'])) {
    
    $add_to_list = mysqli_real_escape_string($connection, $_POST["add-to-list"]);
    $add_proj = mysqli_real_escape_string($connection, $_POST["add-proj-text"]);
    
    $result = mysqli_query($connection, "INSERT INTO project_url (url, project_text)
    VALUES ('$add_to_list', '$add_proj')");
    if($result) {
        $success = 'Du har lagt till i listan!';
    } else {
        $success = 'Error';
    }
}


?>
  <!--************** elements ************************-->
  <?php
$my_work = mysqli_query($connection,
"SELECT *
FROM project_url");
?>
 <div class="dark-bg">
      <h1 class="h1-white">Redigera portfolio</h1>
    </div>

    <!--******************* confirmation message ********************-->
<?php
if(isset($success)) {
    echo "<div class='bg-success'>
            <div class='text-center'><strong>$success</strong></div>
          </div>";
} else {
    echo "";
}
?>

<div class='container'>
 <!--**************** lägg till url ***************-->
    <div class="row">
      <div class="white-bg">
        <form method="post" action="">
          <div class=' form-group row'>
             <div class='col-md-6'>
              <label for='add-to-list' class="control-label">Lägg till projekt url</label>
              <input type="text" class='form-control' name="add-to-list" placeholder="Lägg till en url">   
            </div>
          </div>
         <!--************* lägg till projekttext *************-->
         <div class='form-group row'>
           <div class='col-md-8'>
              <label for="add-proj-text" class="control-label">Lägg till text</label>
              <textarea name="add-proj-text" class='form-control' rows='10' placeholder="Lägg till text"></textarea>
           </div>
         </div>
          <div>
            <input type="submit" class='btn btn-success' name="add-items" value="spara tillägg">
          </div>
        </form>
      </div>
    </div>
<hr>
    
      <?php
while($row = mysqli_fetch_assoc($my_work)) {
    $project_url = $row['url'];
    $project_text = $row['project_text'];
    $id = $row['id'];
    ?>
        <!--Uppdatera url ===================================-->

      <div class="row">
        <div class="white-bg">
          <form method="post" action="">
            <div class='form-group row'>
              <div class='col-md-6'>
                 <label class="control-label">Redigera URL-adress</label>
                  <input type="text" class='form-control' name="url" value="<?php echo $project_url; ?>">
              </div>
            </div>
            <!--Uppdatera projekt text================-->
            <div class='form-group row'>
              <div class='col-md-8'>
                 <label class="control-label">Redigera Projekttexten</label>
                  <input type="hidden" name="txt-url-id" value="<?php echo $id; ?>">
                  <textarea name="project-text" class='form-control' rows="10">
                    <?php echo $project_text; ?>
                  </textarea>
              </div>
            </div>
            <div>
              <input type="submit" class='btn btn-info' name="save-pro-text" value="ändra">
            </div>
          </form>
        </div>
         </div>
        <?php
}
?>
</div>   


   