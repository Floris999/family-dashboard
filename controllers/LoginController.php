<?php
session_start();
require(__DIR__ . "/../firebaseconn.php");
require(__DIR__ . "/../controllers/UserSession.php");


$loginSession = new UserSession($database);
$loginSession->setUserToSession();
$loginSession->redirectUser();


