<?php

class UserSession
{
    private $database;
    public $userId;
    public $username;
    public $password;
    public $avatar;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function setUserToSession()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];

        // Verwijzing naar de 'users'-tabel
        $usersRef = $this->database->getReference('users');

        // Haal alle gebruikers op
        $users = $usersRef->getValue();

        // Controleer of de opgegeven gebruikersnaam bestaat in de database
        foreach ($users as $userId => $user) {
            if ($user['username'] === $username) {
                $_SESSION['login_user'] = $username;
                $_SESSION['user_id'] = $userId; // Sla de gegenereerde ID op in de sessie
                $_SESSION['avatar'] = isset($user['avatar']) ? $user['avatar'] : "/assests/img/kitty.png"; // Sla avatar op in de sessie, gebruik een standaardwaarde als deze niet is ingesteld
                $this->userId = $userId;
                $this->username = $username;
                $this->avatar = $_SESSION['avatar']; // Stel de avatar-eigenschap in
                return; // Gebruiker gevonden, verlaat de lus
            } else {
                $this->username = "";
            }
        }
    }
}


    public function redirectUser()
    {
        if (empty($this->username)) {
            header("Location: /views/login.php");
        } else {
            header("Location: /views/home.php");
        }
    }

    public function isUserLoggedIn()
    {
        session_start();
        return empty($_SESSION['login_user']);
    }
}
