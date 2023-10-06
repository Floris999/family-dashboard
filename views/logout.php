<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . "/../includes/head.php";
?>

<body class="bg-gray-100 mb-5">
    <section class="flex flex-col items-center justify-center h-screen ml-3 mr-3">
        <h1 class="text-4xl font-bold mb-4">Je bent nu uitgelogd <?php echo $_SESSION["login_user"] ?>, tot de volgende keer! 😃</h1>
        <p>Je wordt over 5 seconden automatisch doorgestuurd naar de login pagina</p>
    </section>

    <script>
        setTimeout(function () {
            window.location.href = "/";
        }, 5000); // 5000 milliseconden = 5 seconden
    </script>

</body>
</html>
<?php
    session_destroy();
    ?>
