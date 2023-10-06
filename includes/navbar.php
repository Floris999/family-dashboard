<nav class="sticky bg-blue-500 flex flex-col md:flex-row justify-between items-center md:items-start p-2">
    <div class="flex items-center mb-2 md:mb-0 ml-4 mt-2">
        <a href="/"><img src="<?php echo $_SESSION["avatar"] ?>" alt="Profile Icon" class="w-9 h-9 rounded-full mr-2"></a>
        <a href="/"><span class="text-white font-bold"><?php echo $_SESSION["login_user"] ?></span></a>
    </div>

    <div class="flex justify-center md:justify-end items-center mt-2 md:mt-0">
        <a href="../views/cijfer.php" class="text-white border-b-2 border-white p-2 px-4 m-2 hover:text-blue-600 ">Cijfer geven</a>
        <a href="../views/messages.php" class="text-white border-b-2 border-white p-2 px-4 m-2 hover:text-blue-600">Juice channel</a>
        <a href="../views/profile.php" class=" text-white border-b-2 border-white p-2 px-4 m-2 hover:text-blue-600">Profiel bekijken</a>
        <!-- <a href="../views/logout.php"><button class="bg-white text-blue-500 px-4 py-2 rounded-full hover:bg-blue-100 hover:text-blue-600 m-2 md:ml-2">Uitloggen</button></a> -->
    </div>
</nav>