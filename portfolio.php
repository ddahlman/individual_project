<h1 class="h1-col">Mitt arbete</h1>

<?php
$urls = mysqli_query($connection, 'SELECT * FROM project_url');

while ($row = mysqli_fetch_assoc($urls)) {
    $project_url = $row['url'];
    $project_text = $row['project_text'];
    
    echo "<div class='well'><a href='$project_url'>$project_url</a>" .
    "<p>$project_text</p></div>";
}
?>