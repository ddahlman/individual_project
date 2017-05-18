<?php
include('config.php');
session_start();
if(isset($_SESSION['login_user'])) {
    header("location: home_load.php");
}
$error = '';
if(isset($_POST['submit'])) {
    if(empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Användarnamn eller lösenord är ogiltigt!";
    }
    
    else
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        
        
        
        if(!$connection) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debbuging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        
        // Hacker protection
        $username = stripslashes($username); // removes slash
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($connection, $username); //removes dangerous strings
        $password = mysqli_real_escape_string($connection, $password);
        
        //checks if the username and password is in the database and put it in $query
        $query = mysqli_query( $connection, "SELECT * FROM login WHERE password='$password' AND username='$username'");
        
        //checks if $query has info from the database
        if (mysqli_num_rows($query) == 1) {
            $_SESSION['login_user'] = $username; //sets the key to login_user and the value to $username
            header("location: home_load.php");
        }
        
        else
        {
            $error= "Användarnamn eller lösenord är ogiltigt";
        }
        mysqli_close($connection);
    }
}
?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Admin</title>

    <link href='/CSS/myStyle.css' rel='stylesheet'>
  </head>

  <body>

    <form action="" method="post">
      <label for="username">Användarnamn</label>
      <input type="text" name="username" placeholder="Användarnamn">
      <label for="password">Lösenord</label>
      <input type="password" name="password" placeholder="Lösenord">
      <input type="submit" name="submit" value="Logga in">
      <h3><?php echo $error ?></h3>
    </form>

  </body>

  </html>