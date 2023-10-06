<?php
require(__DIR__ . "/../firebaseconn.php");

class SignupController {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function createUser($username, $password) {
        $ref_table = "users";
    
        // Check if the username already exists in the database
        $users = $this->database->getReference($ref_table)->getValue();
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                return false; // Username already exists
            }
        }
    
        $postData = [
            "username" => $username,
            "password" => $password,
            "avatar" => "/assests/img/kitty.png",
        ];
    
        // Voeg de gebruiker toe en bewaar de gegenereerde ID
        $newUserRef = $this->database->getReference($ref_table)->push($postData);
    
        // Retourneer de gegenereerde ID als de gebruiker succesvol is aangemaakt
        return $newUserRef->getKey();
    }
    
}

$signupController = new SignupController($database);

// Check if the request method is POST and process the form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($signupController->createUser($username, $password)) {
        // Redirect to homepage on successful creation
        header("Location: /?succes=greenlight");
        session_destroy();
        exit();
    } else {
        // Redirect to signup form with error message
        header("Location: /views/signup.php?error=exists");
        session_destroy();
        exit();
    }
}
?>
