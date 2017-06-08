<?php
#
# Den här klassen ska köras om vi anropat resursen user i vårt API genom /?/user
#
class _login extends Resource{ // Klassen ärver egenskaper från den generella klassen Resource som finns i resource.class.php
    # Här deklareras de variabler/members som objektet ska ha
    public $user_name, $id, $loggedin, $request;
    # Här skapas konstruktorn som körs när objektet skapas
    function __construct($resource_id, $request){
        
        # Om vi fått med ett id på resurser (Ex /?/user/15) och det är ett nummer sparar vi det i objektet genom $this->id
        if(is_numeric($resource_id))
        $this->user_id = $resource_id;
        # Vi sparar också det som kommer med i URL:en efter vårt user_id som en array
        $this->request = $request;
    }
    
    function GET($input, $db){
        $this->id = $_SESSION['login_user'];
        
    }
    
    # Denna funktion körs om vi anropat resursen genom HTTP-metoden POST
    function POST($input, $db){
        
        # I denna funktion skapar vi en ny user med den input vi fått
        /* if(isset($input['user_name'], $input['user_password'])){*/
        $user_name = escape($input['username']);
        $user_password = escape($input['password']);
        
        $salt = 'MinFörstaRiktigaHemsidaMedSäkerhet!84';
        $user_password = crypt($user_password, $salt);
        
        $query = "SELECT * FROM login
        WHERE username = '$user_name'
        AND password = '$user_password'";
        
        $result = mysqli_query($db, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['login_user'] = $user['id'];//sets the key to login_user and the value to $id
            /*$this->user_name = $user['username'];
            $this->id = $user['id'];*/
            $this->session = session_id();
        } else {
            
        }
        
    }
    
    function DELETE(){
        session_destroy();
        if(isset( $_SESSION['login_user'] ))
        echo "nått gick fel";
    }
    
}