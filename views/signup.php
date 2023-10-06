<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Aanmelden</title>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="max-w-md w-full px-6 py-8 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Wat leuk dat je een account gaat aanmaken</h1>
        <h2 class="text-m font-semibold mb-4">Vul hieronder je gebruikersnaam in en geef een wachtwoord op</h2>
        <p class="text-s mb-4">Onthoud je gebruikersnaam goed, deze naam heb je altijd nodig om te kunnen inloggen</p>
        <!-- Duplicate username error -->
        <?php
        if (isset($_GET["error"]) && $_GET["error"] === "exists") {
            echo '<p class="text-red-500">De opgegeven gebruikersnaam bestaat al. Kies een andere gebruikersnaam.</p>';
        }
        ?>
        <!-- End of duplicate username error -->
        <form action="../controllers/SignupController.php" method="POST">
            <div class="mb-4">
                <label for="username" class="block font-medium mb-2">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" required class="w-full px-4 py-2 rounded-md border focus:outline-none focus:border-blue-500 ">
            </div>
            <div class="mb-4">
                <label for="password" class="block font-medium mb-2">Wachtwoord:</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 rounded-md border focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Aanmelden</button>
        </form>
        <section class="flex items-center justify-center mt-8 space-x-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                <a href="/">Terug naar dashboard</a>
            </button>
        </section>
    </div>
</body>

</html>