<?php

#
# Den här klassen ska köras om vi anropat resursen user i vårt API genom /?/user
#
class _about extends Resource{ // Klassen ärver egenskaper från den generella klassen Resource som finns i resource.class.php
    
    # Här deklareras de variabler/members som objektet ska ha
    public $text, $id, $texts, $request;
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
            FROM about
            WHERE id = $this->id
            ";
            $result = mysqli_query($connection, $query);
            $text = mysqli_fetch_assoc($result);
            $this->text = $text['text'];
            
        }else{ // om vår URL inte innehåller ett ID hämtas alla users
            $query = "SELECT *
            FROM about
            ";
            $result = mysqli_query($connection, $query);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            $this->texts = $data;
        }
    }
    # Denna funktion körs om vi anropat resursen genom HTTP-metoden POST
    function POST($input, $connection){
        # I denna funktion skapar vi en ny user med den input vi fått
        $text = escape($input['text']);
        $query = "INSERT INTO about
        (text)
        VALUES ('$text')
        ";
        if(mysqli_query($connection, $query)) {
            $this->text = $text;
        }
    }
    # Denna funktion körs om vi anropat resursen genom HTTP-metoden PUT
    function PUT($input, $connection){
        # I denna funktion uppdateras en specifik mytext med den input vi fått
        # Observera att allt uppdateras varje gång och att denna borde byggas om så att bara det vi skickar med uppdateras
        if($this->id){
            $text = escape($input['text']);
            $query = "UPDATE about
            SET text = '$text'
            WHERE id = $this->id
            ";
            if(mysqli_query($connection, $query)) {
                $this->text = $text;
            }
        }else{
            echo "No resource given";
        }
    }
    
}