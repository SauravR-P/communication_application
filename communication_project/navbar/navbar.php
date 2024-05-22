<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communication Application</title>
    <style>
        /* Navbar styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4CAF50;
            padding: 10px 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: block;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar .nav-links {
            display: flex;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <a href='../homePage/home_page.php'>Communication Application</a>
    </div>
    <div class="nav-links">
        <a href='../chats/chat_main.php'>Group Chat</a>
        <a href="../users/get_users.php">Manage Users</a>
        <a href="../documents/files_ui.php">Manage Documents</a>
        <a href="../authorisation/logout/logout.php">Logout</a>
    </div>
</div>

</body>
</html>
