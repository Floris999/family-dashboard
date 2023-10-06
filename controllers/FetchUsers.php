<?php

class FetchUsers {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getUsers()
    {
        // Haal de lijst met gebruikers op zoals je eerder deed
        $users = $this->database->getReference('users')->getValue();

        // Loop door de gebruikers en controleer of 'number' bestaat, voeg zo nodig toe
        foreach ($users as &$user) {
            if (!isset($user['number'])) {
                $user['number'] = "Nog geen cijfer gegeven";
            }
        }

        // Geef de aangepaste lijst met gebruikers terug
        return $users;
    }

    public function getLoggedInUserName($loggedInUserId) {
        $users = $this->getUsers();

        foreach ($users as $user) {
            if ($user['id'] === $loggedInUserId) {
                return $user['name'];
            }
        }

        return "Onbekende Gebruiker";
    }

    public function getAverageScore() {
        $users = $this->getUsers();
        $totalScore = 0;
        $count = 0;

        foreach ($users as $user) {
            // Controleer of het 'number'-veld numeriek is
            if (is_numeric($user['number'])) {
                $totalScore += intval($user['number']);
                $count++;
            }
        }

        // Bereken het gemiddelde, rond af naar het dichtstbijzijnde gehele getal
        if ($count > 0) {
            $average = round($totalScore / $count);
            return $average;
        } else {
            return 0; // Geen cijfers beschikbaar om een gemiddelde te berekenen
        }
    }

    public function getUserNumber($username) {
        $users = $this->getUsers();
    
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                return isset($user['number']) ? $user['number'] : "Nog geen cijfer gegeven";
            }
        }
    
        return "Gebruiker niet gevonden";
    }

    public function getUserAvatar($username) {
        $users = $this->getUsers();
    
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                return isset($user['avatar']) ? $user['avatar'] : "/assests/img/kitty.png";
            }
        }
    
        return "Avatar niet gevonden";
    }
}