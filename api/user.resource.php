<?php
#
# Den här klassen ska köras om vi anropat resursen user i vårt API genom /?/user
#
class _user extends Resource{ // Klassen ärver egenskaper från den generella klassen Resource som finns i resource.class.php
    # Här deklareras de variabler/members som objektet ska ha
    public $name, $address, $phone, $email, $id, $users, $request;
    # Här skapas konstruktorn som körs när objektet skapas
    function __construct($resource_id, $request){
        
        # Om vi fått med ett id på resurser (Ex /?/user/15) och det är ett nummer sparar vi det i objektet genom $this->id
        if(is_numeric($resource_id))
        $this->id = $resource_id;
        # Vi sparar också det som kommer med i URL:en efter vårt id som en array
        $this->request = $request;
    }
    # Denna funktion körs om vi anropat resursen genom HTTP-metoden GET
    function GET($input, $connection){
        # Här kollar vi om det efterfrågats en "collection" inom resursen, exempelvis "friends" i URL:en /?/user/15/friends
        $collection = "";
        if(isset($this->request[0])) $collection = $this->request[0];
        # Beroende på vilken "collection" som anropats gör vi olika saker
        switch($collection){
            case 'friends':
                echo "friends!";
                break;
            case 'books':
                echo "books!";
                break;
            case 'posts':
                echo "posts!";
                break;
            default: // Om det inte är en collection, eller om den inte är definierad ovan
                $this->getUserData($input, $connection);
        }
    }
    # Den här funktionen är privat och kan bara köras inom objektet, inte utanför
    private function getUserData($input, $connection){
        if($this->id){ // Om vår URL innehåller ett ID på resursen hämtas bara den usern
            $query = "SELECT *
            FROM users
            WHERE id = $this->id";
            
            $result = mysqli_query($connection, $query);
            $user = mysqli_fetch_assoc($result);
            $this->name = $user['name'];
            
        }else{ // om vår URL inte innehåller ett ID hämtas alla users
            $query = "SELECT *
            FROM users
            ";
            $result = mysqli_query($connection, $query);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            $this->users = $data;
        }
    }
    # Denna funktion körs om vi anropat resursen genom HTTP-metoden POST
    function POST($input, $connection){
        # I denna funktion skapar vi en ny user med den input vi fått
        $this->name = escape($input['name']);
        $this->address = escape($input['address']);
        $this->phone = escape($input['phone']);
        $this->email = escape($input['email']);
        
        $query = "INSERT INTO users
        (name, address, phone, email)
        VALUES ('$this->name', '$this->address', '$this->phone', '$this->email')";
        
        mysqli_query($connection, $query);
    }
    # Denna funktion körs om vi anropat resursen genom HTTP-metoden PUT
    function PUT($input, $connection){
        # I denna funktion uppdateras en specifik user med den input vi fått
        # Observera att allt uppdaterad varje gång och att denna borde byggas om så att bara det vi skickar med uppdateras
        if($this->id){
            $this->name = escape($input['name']);
            $this->address = escape($input['address']);
            $this->phone = escape($input['phone']);
            $this->email = escape($input['email']);
            
            $query = "
            UPDATE users
            SET name = '$this->name', address = '$this->address', phone = '$this->phone', email = '$this->email'
            WHERE id = $this->id
            ";
            mysqli_query($connection, $query);
        }else{
            echo "No resource given";
        }
    }
    # Denna funktion körs om vi anropat resursen genom HTTP-metoden DELETE
    function DELETE($input, $connection){
        # I denna funktion tar vi bort en specifik user med det ID vi fått med
        if($this->id){
            $query = "
            DELETE FROM users
            WHERE id = $this->id
            ";
            mysqli_query($connection, $query);
        }else{
            echo "No resource given";
        }
    }
}