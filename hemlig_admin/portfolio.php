<?php

?>

  <?php
$my_work = mysqli_query($connection,
"SELECT *
FROM project_url");
?>


    <h1 class="h1-white">Redigera URL och projekt-text</h1>
    <ul>
      <?php
while($row = mysqli_fetch_assoc($my_work)) {
    $project_url = $row['url'];
    $project_text = $row['project_text'];
    $id = $row['id'];
    ?>
        <li>
          <form method="post" action="">
            <input type="hidden" name="url-id" value="<?php echo $id; ?>">
            <input type="text" name="url" value="<?php echo $project_url; ?>">
            <input type="submit" name="" value="ändra">
          </form>
        </li>
        <?php
}
?>
    </ul>
    <form method="post" action="">
      <h1 class="h1-white">Lägg till i listan</h1>
      <input type="text" name="add-to-list" placeholder="Lägg till en url">
      <input type="submit" name="add-items" value="spara tillägg">
    </form>

    <?php
if(isset($success_1)) {
    echo $success_1;
} else {
    echo "";
}
?>

      </div>