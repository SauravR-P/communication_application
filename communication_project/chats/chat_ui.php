<?php

// SQL Connection
include '../helpers/sql_connection/db_connect.php';
include './insert_chat.php';

session_start();
// login page 
$chat = $_POST["chat"];

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    postChat($chat, $username);
} else {
    echo " No Session found ";
    // Redirect to login page or handle unauthorized access
    $targetURL = '../authorisation/login/login.html';
    header("Location: " . $targetURL);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the chat message from the form
    $chat = htmlspecialchars($_POST['chat']);
    echo "<div style='text-align: center;'>";
    echo "<h1 Success!</h1>";
    echo "<h1>Your chat has been posted successfully.</h1>";
    echo "<h5>Please wait redirecting to chats ...... </h5>";
    echo "</div>";

    // Redirect to the main page after 2 seconds
    echo "<script>
        setTimeout(function() {
            window.location.href = './chat_main.php'; 
        }, 2000);
    </script>";
} else {
    // If the form is not submitted via POST
    echo "Error: Form not submitted.";
}
