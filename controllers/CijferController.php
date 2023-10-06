<?php
require(__DIR__ . "/../firebaseconn.php");

class CijferController
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addCijferToUser($number)
    {
        // Haal de gebruikers-ID op uit de sessie
        session_start();
        $userId = $_SESSION['user_id'];

        // Bouw de referentie naar de gebruiker op
        $ref_path = "users/$userId/number"; // Specificeer het veld waarin je het cijfer wilt toevoegen

        // Controleer of het cijfer al bestaat in de database
        $existingNumber = $this->database->getReference($ref_path)->getValue();
        if (isset($existingNumber) && $existingNumber === $number) {
            return false; // Cijfer bestaat al in de database
        }

        // Voeg het cijfer toe aan de gebruiker
        $this->database->getReference($ref_path)->set($number);

        return true; // Succesvol toegevoegd
    }
}

$cijferController = new CijferController($database);

// Controleer of het verzoeksmethode POST is en verwerk de formuliergegevens
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number = $_POST["number"];

    if ($cijferController->addCijferToUser($number)) {
        // Doe iets op de succesvolle update
        header("Location: /views/cijfer.php?succes=numberadded");
        exit();
    } else {
        // Doe iets als het cijfer al bestaat
        header("Location: /views/cijfer.php?error=numberexists");
        exit();
    }
}
