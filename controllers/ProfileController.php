<?php

require(__DIR__ . "/../firebaseconn.php");
require(__DIR__ . "/FetchUsers.php");

class ProfileController {
    private $database;
    private $fetchUsers;

    public function __construct($database) {
        $this->database = $database;
        $this->fetchUsers = new FetchUsers($database);
    }

    public function getUserNumber($username) {
        // Roep de getNumberForUser-methode aan om het cijfer voor de ingelogde gebruiker op te halen
        $number = $this->fetchUsers->getUserNumber($username);

        return $number;
    }

    public function getUserAvatar($username) {
        
        $avatar = $this->fetchUsers->getUserAvatar($username);

        return $avatar;
    }


    public function selectAvatar($URI) {
        // Haal de gebruikers-ID op uit de sessie
        session_start();
        $userId = $_SESSION['user_id'];

        // Bouw de referentie naar de gebruiker op
        $ref_path = "users/$userId/avatar"; // Specificeer het veld waarin je het cijfer wilt toevoegen


        $this->database->getReference($ref_path)->set($URI);

        return true; // Succesvol toegevoegd
    }
    
}

$profileController = new ProfileController($database);

// Controleer of het verzoeksmethode POST is en verwerk de formuliergegevens
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $URI = $_POST["avatar"];

    if ($profileController->selectAvatar($URI)) {
        // Doe iets op de succesvolle update
        header("Location: /views/profile.php?succes=numberadded");
        exit();
    } else {
        // Doe iets als het cijfer al bestaat
        header("Location: /views/profile.php?error=numberexists");
        exit();
    }
}