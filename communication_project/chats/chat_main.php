<?php
include './get_chats.php';
include '../navbar/navbar.php'; 


//Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Page</title>
    <style>
        /* Basic styling for the layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .form-container {
            width: 28%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .chat-container {
            width: 60%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2,
        .chat-container h2 {
            text-align: center;
        }

        .form-container div,
        .chat-container div {
            margin-bottom: 15px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            width: 80%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #4CAF50;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h1>Welcome  $username!</h1>";
        ?>
        <div class="container">
            <div class="form-container">
                <h2>Post a Chat</h2>
                <form action="./chat_ui.php" method="POST" id="chatForm">
                    <div>
                        <label for="chat">Write a Chat:</label>
                        <input type="text" id="chat" name="chat" required>
                    </div>
                    <div>
                        <button type="submit">Post</button>
                    </div>
                </form>
            </div>
            <div class="chat-container">
                <h2>Chat Messages</h2>
                <?php echo getChats($username); ?>
            </div>
        </div>
        <?php
    } else {
        echo "No Session found.";
        // Redirect to login page or handle unauthorized access
        $targetURL = '../authorisation/login/login.html';
        header("Location: " . $targetURL);
        exit(); //
    }
    ?>
</body>

</html>