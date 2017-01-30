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






  <div class="container">
    <h1>Meddelanden</h1>
    <h2>Nya meddelanden</h2>
    <?php
while($row = mysqli_fetch_assoc($result)) {
    echo "<div class='well bookings'>
    <div class='center-block'>
    <strong>{$row['name_contact']}</strong> </p><br>
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
    <button type='submit' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span> ta bort</button>
    </form>
    </div>";
}
?>

  </div>