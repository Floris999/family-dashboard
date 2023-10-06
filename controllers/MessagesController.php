<?php
require(__DIR__ . "/../firebaseconn.php");

class MessagesController {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function createMessage($message, $userName, $date) {
        $ref_table = "messages";
    
        $postData = [
            "username" => $userName,
            "message" => $message,
            "date" => $date,
        ];
    
        // Voeg de gebruiker toe en bewaar de gegenereerde ID
        $newUserRef = $this->database->getReference($ref_table)->push($postData);
        header("Location: " . $_SERVER['PHP_SELF']);
    
        // Retourneer de gegenereerde ID als de gebruiker succesvol is aangemaakt
        return $newUserRef;
    }

    public function getMessages()
    {
        // Haal de lijst met gebruikers op zoals je eerder deed
        $messages = $this->database->getReference('messages')->getValue();

        // Geef de aangepaste lijst met gebruikers terug
        return $messages;
    }
    
}

