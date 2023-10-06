<!DOCTYPE html>
<html lang="en">

<?php
require(__DIR__ . "/../controllers/ProfileController.php");
require(__DIR__ . "/../firebaseconn.php");
include __DIR__ . "/../includes/head.php";
include __DIR__ . "/../includes/navbar.php";

$profileController = new FetchUsers($database);
?>

<body class="bg-gray-100">
    <div class="flex items-center justify-center h-screen p-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Profielafbeelding -->
            <div class="bg-blue-500 h-48 flex items-center justify-center">
                <img src="<?php echo $profileController->getUserAvatar($_SESSION["login_user"]); ?>" alt="Profielafbeelding" class="w-20 h-20 rounded-full">
            </div>
            <div class="text-left py-4">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="avatar_form" method="POST" class="flex flex-wrap justify-center">
                    <div class="form-check form-check-inline m-2">
                        <input class="form-check-input" type="radio" name="avatar" id="avatar1" value="/assests/img/kitty.png">
                        <label class="form-check-label" for="avatar1">
                            <img src="../assests/img/kitty.png" alt="Avatar" class="img-thumbnail w-9 h-9">
                        </label>
                    </div>
                    <div class="form-check form-check-inline m-2">
                        <input class="form-check-input" type="radio" name="avatar" id="avatar2" value="/assests/img/dog.png">
                        <label class="form-check-label" for="avatar2">
                            <img src="../assests/img/dog.png" alt="Avatar" class="img-thumbnail w-9 h-9">
                        </label>
                    </div>
                    <div class="form-check form-check-inline m-2">
                        <input class="form-check-input" type="radio" name="avatar" id="avatar3" value="/assests/img/princess.png">
                        <label class="form-check-label" for="avatar3">
                            <img src="../assests/img/princess.png" alt="Avatar 3" class="img-thumbnail w-9 h-9">
                        </label>
                    </div>
                    <div class="form-check form-check-inline m-2">
                        <input class="form-check-input" type="radio" name="avatar" id="avatar4" value="/assests/img/poop.png">
                        <label class="form-check-label" for="avatar4">
                            <img src="../assests/img/poop.png" alt="Avatar 4" class="img-thumbnail w-9 h-9">
                        </label>
                    </div>
                    <div class="form-check form-check-inline m-2">
                        <input class="form-check-input" type="radio" name="avatar" id="avatar5" value="/assests/img/superman.png">
                        <label class="form-check-label" for="avatar5">
                            <img src="../assests/img/superman.png" alt="Avatar 5" class="img-thumbnail w-9 h-9">
                        </label>
                    </div>
                    <div class="form-check form-check-inline m-2">
                        <input class="form-check-input" type="radio" name="avatar" id="avatar6" value="/assests/img/buddha.png">
                        <label class="form-check-label" for="avatar6">
                            <img src="../assests/img/buddha.png" alt="Avatar 6" class="img-thumbnail w-9 h-9">
                        </label>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <button type="submit" form="avatar_form" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Opslaan</button>
                </div>

            </div>
            <!-- Gebruikersnaam -->
            <div class="text-center py-4">
                <h1 class="text-2xl font-semibold"><?php echo $_SESSION["login_user"] ?></h1>
            </div>
            <!-- Gebruikersinformatie -->
            <div class="p-4 text-center">
                <p class="text-sm mb-2">Je hebt op dit moment het cijfer: <span class="text-blue-500 font-bold"><?php echo $profileController->getUserNumber($_SESSION["login_user"]); ?></span> gegeven.</p>
                <a href="../views/logout.php"><button class="bg-white text-blue-500 px-4 py-2 rounded-full hover:bg-blue-100 hover:text-blue-600 m-2 md:ml-2">Uitloggen</button></a>
            </div>
            <!-- Profielfoto uploadformulier -->
        </div>
    </div>
</body>


</html>