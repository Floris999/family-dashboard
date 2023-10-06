<!DOCTYPE html>
<html lang="en">
<?php
require(__DIR__ . "/../firebaseconn.php");
include __DIR__ . "/../includes/head.php";
include __DIR__ . "/../includes/navbar.php";
require(__DIR__ . "/../controllers/MessagesController.php"); // Adjust the path as needed

$fetchMessages = new MessagesController($database);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["message"])) {
    $message = $_POST["message"];
    $userName = $_SESSION['login_user'];
    $date = date("d/m/Y");
    $fetchMessages->createMessage($message, $userName, $date);

    // Redirect to the same page after adding the message
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

?>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Header here -->
    <!-- Include your header content here -->

    <!-- Message Container -->
    <div class="flex-grow p-4 overflow-y-auto">
        <?php
        $messages = $fetchMessages->getMessages();
        // Slice the array to display only the last 10 messages
        // Check if $messages is not null and not empty
        if (!is_null($messages) && !empty($messages)) {
            // Slice the array to display only the last 10 messages
            $messagesToShow = array_slice($messages, -10);

            foreach ($messagesToShow as $message) {
                echo '<div class="mb-4">';
                echo '<div class="bg-white rounded-lg p-3 shadow-md">';
                echo '<p class="text-gray-800">' . $message['message'] . '</p>';
                echo '<p class="text-sm text-gray-500">Send on ' . $message['date'] . ' <span class="text-blue-500 font-semibold italic">' . $message["username"] . '</span></p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            // Display a message when there are no messages
            echo '<p class="text-gray-800">Wat een stilte, er wordt hier nog niet gepraat. Schrijf nu een bericht!</p>';
        }
        ?>
    </div>

    <!-- Add Your Message (Sticky at Bottom) -->
    <div class="bg-white rounded-lg p-3 shadow-md fixed bottom-0 left-0 right-0 mb-4 ml-4 mr-4">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <textarea name="message" class="w-full p-2 border rounded" placeholder="Typ hier je juice..."></textarea>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full mt-2 hover:bg-blue-600">Send</button>
        </form>
    </div>
</body>

</html>