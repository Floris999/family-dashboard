<?php 
    require(__DIR__ . "/../firebaseconn.php");
    require(__DIR__ . "/../controllers/UserSession.php");
    
    $loginSession = new UserSession($database);
    if($loginSession->isUserLoggedIn()) {
        header("Location: /views/login.php");
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>