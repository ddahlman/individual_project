<?php

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    
    $query = "DELETE FROM inc_message
    WHERE id = $id";
    
    mysqli_query($connection, $query);
}
mysqli_query($connection, "SET NAMES utf8");
$query = "SELECT *
FROM inc_message AS i
ORDER BY i.id DESC";
$result = mysqli_query($connection, $query);



?>




<div class="dark-bg">
      <h1 class="h1-white">Meddelanden</h1>
    </div>

  <div class="container">
    
    <h2>Nya meddelanden (<span id='counter'></span>)</h2>
    <?php
while($row = mysqli_fetch_assoc($result)) {
    echo "<div class='well messages'>
    <div class='center-block'>
    <h2><strong>{$row['name_contact']}</strong></h2><br>
    </div>
    <div class='row'>
    <div class='well col-md-6'>
    <h3>Kontaktuppgifter</h3>
    <p>{$row['phone_contact']}</p>
    <p>{$row['email_contact']}</p>
    <p>{$row['note_contact']}</p>
    </div>
    </div>
    <form method='post'>
    <input type='hidden' name='id' value='{$row['id']}'>
    <button type='submit' class='btn btn-danger'><span class='fa fa-remove'></span> ta bort</button>
    </form>
    </div>";
}
?>

  </div>