<?php
$result = mysqli_query($connection, "SELECT * FROM cv_firsttext WHERE id=1");
$row = mysqli_fetch_assoc($result);
$first_text = $row['first_text'];

$first_head = mysqli_query($connection, "SELECT header FROM cv_grey_headers WHERE headersID=1");
$row = mysqli_fetch_assoc($first_head);
$first_header = $row['header'];

$second_head = mysqli_query($connection, "SELECT header FROM cv_grey_headers WHERE headersID=2");
$row = mysqli_fetch_assoc($second_head);
$second_header = $row['header'];

$third_head = mysqli_query($connection, "SELECT header FROM cv_grey_headers WHERE headersID=3");
$row = mysqli_fetch_assoc($third_head);
$third_header = $row['header'];

$first_li = mysqli_query($connection, "SELECT list_item FROM items WHERE headersID=1");

$second_li = mysqli_query($connection, "SELECT list_item FROM items WHERE headersID=2");

$third_li = mysqli_query($connection, "SELECT list_item FROM items WHERE headersID=3");

$employment_result = mysqli_query($connection, "SELECT * FROM employments");

$educatio_result = mysqli_query($connection, "SELECT * FROM education");

?>

  <div class="flex-col-img2">
    <img src="img/daniel in progress copy2copy.jpg" alt="daniel dahlman">
    <div class="h1-header-about">
      <h1 class="h1-flex-about"> C V </h1>
    </div>
    <div class="like-block">
      <button class="like-button share s_twitter"><span class="nr2 fa fa-twitter-square"></span></button>
      <button class="like-button share s_facebook"><span class="nr2 fa fa-facebook-square"></span></button>
      <button class="like-button share s_plus"><span class="nr2 fa fa-google-plus-official"></span></button>
      <button class="like-button share s_linkedin"><span class="nr2 fa fa-linkedin-square"></span></button>
    </div>
  </div>
  <div class="flex-row">
    <div class="flex-col">
      <?php
echo "<p>$first_text</p>";
?>
    </div>
  </div>
  <div class="flex-row-2">
    <div class="flex-col-card grey-pants expand">
      <h1 class="h1-about">
<?php
echo $first_header;
?>
</h1>
      <a href="#">mer info<i class="fa fa-plus-circle close"></i></a>
      <ul class="myInfo">
        <?php
while( $row = mysqli_fetch_assoc($first_li)) {
    $first_list = $row['list_item'];
    
    echo "<li>$first_list</li>";
}
?>
      </ul>
    </div>
    <div class="flex-col-card grey-pants expand">
      <h1 class="h1-about">
<?php
echo $second_header;
?>
</h1>
      <a href="#">mer info<i class="fa fa-plus-circle close"></i></a>
      <ul class="myInfo">
        <?php
while( $row = mysqli_fetch_assoc($second_li)) {
    $second_list = $row['list_item'];
    
    echo "<li>$second_list</li>";
}
?>
      </ul>
    </div>
    <div class="flex-col-card grey-pants expand">
      <h1 class="h1-about">
<?php
echo $third_header;
?>
</h1>
      <a href="#">mer info<i class="fa fa-plus-circle close"></i></a>
      <ul class="myInfo">
        <?php
while( $row = mysqli_fetch_assoc($third_li)) {
    $third_list = $row['list_item'];
    
    echo "<li>$third_list</li>";
}
?>
      </ul>
    </div>
  </div>

  <div class="flex-col expand">
    <h1 class="h1-col">Anställningar och erfarenheter</h1>
    <a href="#">klicka här mer info<i class="fa fa-plus-circle close"></i></a>
    <hr class="hr">
    <ul class="myInfo">
      <?php
while ($row = mysqli_fetch_assoc($employment_result)) {
    $employment = $row["employment"];
    $year = $row["year"];
    
    echo "<li class='li-education'>
    <br />$employment</li>
    <li class='li-education'> $year</li>";
}
?>
    </ul>
  </div>

  <div class="flex-col expand">
    <h1 class="h1-col">Utbildningar</h1>
    <a href="#">mer info<i class="fa fa-plus-circle close"></i></a>
    <hr class="hr">
    <ul class="myInfo">
      <?php
while ($row = mysqli_fetch_assoc($educatio_result)) {
    $school = $row["schools"];
    $years = $row["years"];
    
    echo "<li class='li-education'>
    <br />$school
    </li>
    <li class='li-education'>$years</li>";
}
?>
    </ul>
  </div>