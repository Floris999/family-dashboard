<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-20 w-auto" src="../assests/img/human.png" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Welkom! Klaar om een cijfer te geven?</h2>
        </div>
        <!-- Foutmelding bij onjuiste inloggegevens -->
        <?php
        if (isset($_GET["loginError"]) && $_GET["loginError"] === "true") {
            echo '<p class="text-red-500 text-sm mt-2">Verkeerde gebruikersnaam of wachtwoord. Probeer het opnieuw.</p>';
        }
        ?>
        <!-- Einde van foutmelding -->
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="../controllers/LoginController.php" method="POST">
                <div>
                    <label for="text" class="block text-sm font-medium leading-6 text-gray-900">Gebruikersnaam</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Wachtwoord</label>
                        <div class="text-sm">
                            <a href="./signup.php" class="font-semibold text-indigo-600 hover:text-indigo-500">Wachtwoord vergeten</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit" name="login_btn" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Geen account?
                <a href="../views/signup.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Maak een account</a>
            </p>
        </div>
    </div>

</body>

</html>