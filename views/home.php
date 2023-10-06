<!DOCTYPE html>
<html lang="en">

<?php
require(__DIR__ . "/../controllers/FetchUsers.php");
require(__DIR__ . "/../firebaseconn.php");
include __DIR__ . "/../includes/head.php";
include __DIR__ . "/../includes/navbar.php";

$fetchUsers = new FetchUsers($database);
// $loggedInUserId = "123"; // Vervang dit met de daadwerkelijke ingelogde gebruiker ID

$averageScore = $fetchUsers->getAverageScore();
?>

<body class="bg-gray-100">
    <section class="flex flex-col items-center justify-center ml-3 mr-3 mt-56 mb-56">
        <!-- Succesfull add user notification -->
        <?php
        if (isset($_GET["succes"]) && $_GET["succes"] === "greenlight") {
            echo '<p class="text-green-500 m-5">Je account is aangemaakt! Scrol naar beneden om jezelf in het rijtje te zien staan!';
        }
        ?>
        <!-- End of succesfull add user notification -->
        <h1 class="text-4xl font-bold mb-4">Hallo <?php echo $_SESSION["login_user"] ?>! Welkom op je persoonlijke familie dashboard 😃</h1>
        <h2 class="text-2xl mb-2">Het gemiddelde cijfer is op dit moment een:</h2>
        <p class="text-5xl text-blue-500 font-semibold"><?php echo $averageScore; ?></p>
        <!-- Button to view all scores -->
        <!-- <a href="#view-scores" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Bekijk gegeven cijfers</a> -->
    </section>

    <section id="view-scores" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4 justify-center items-center bg-white rounded-lg p-3 shadow-md m-4">
        <?php
        foreach ($fetchUsers->getUsers() as $user) {
            echo '<div class="text-center">';
            echo '<div class="mx-auto text-center"><img src="' . $user['avatar'] . '" alt="User Image" class="w-16 h-16 mx-auto"></div>';
            echo '<h3 class="text-lg font-semibold mt-2">' . $user['username'] . '</h3>';
            echo '<p class="mt-1">Het gegeven cijfer: <span class="text-blue-500">' . $user['number'] . '</span></p>';
            echo '</div>';
        }
        ?>
    </section>

</body>

</html>