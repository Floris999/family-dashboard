<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . "/../includes/head.php";
include __DIR__ . "/../includes/navbar.php";

?>

<body class="bg-gray-100 mb-5">
    <div class="max-w-md mx-auto mt-40 w-full px-6 py-8 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Spannend! Je staat op het punt een cijfer te geven</h1>
        <h2 class="text-m font-semibold mb-4">Geef je cijfer hieronder aan, denk er goed over na!</h2>
        <p class="text-s mb-4">Vervolgens wordt jouw cijfer aan het gemiddelde toegevoegd. Dit kun je zien op de homepage van je dashboard.</p>
        <!-- Duplicate number error -->
        <?php
        if (isset($_GET["error"]) && $_GET["error"] === "numberexists") {
            echo '<p class="text-red-500">Oeps! Dit cijfer had je de vorige keer al gegeven</p>';
        }
        ?>
        <!-- End of duplicate number error -->
        <!-- Succes added number message -->
        <?php
        if (isset($_GET["succes"]) && $_GET["succes"] === "numberadded") {
            echo '<p class="text-green-500">Yes! Je cijfer is gegeven. Ga snel naar het dashboard om het nieuwe resultaat te zien!</p>';
        }
        ?>
        <!-- Succes added number message -->
        <form action="../controllers/CijferController.php" method="POST">
            <div class="mb-4">
                <label for="number" class="block font-medium mb-2">Wat voor cijfer geef je vandaag?</label>
                <input type="number" id="number" name="number" required min="1" max="10" class="w-full px-4 py-2 rounded-md border focus:outline-none focus:border-blue-500 ">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Cijfer geven</button>
        </form>
        <section class="flex items-center justify-center mt-8 space-x-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                <a href="/">Terug naar dashboard</a>
            </button>
        </section>
    </div>

</body>

</html>