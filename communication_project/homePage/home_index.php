<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Communications Application</title>
  <!-- <link rel="stylesheet" href="./css/style.css"> -->
  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  text-align: center;
}

header {
  margin-bottom: 20px;
}

h1 {
  color: #333;
}

nav {
  width: 100%;
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.tabs {
  list-style-type: none;
  padding: 0;
  margin: 0;
  display: flex;
}

.tab {
  margin: 0 10px;
}

.tab a {
  display: block;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.tab a:hover {
  background-color: #0056b3;
}

  </style>
</head>
<body>
  <header>
    <h1>Communications Application</h1>
  </header>
  <nav>
    <ul class="tabs">
      <li class="tab"><a href='../chats/chat_main.php'>Group Chat </a></li>
      <li class="tab"><a href='../users/get_users.php'>Manage users</a></li>
      <li class="tab"><a href="../documents/files_ui.php">Manage Documents</a></li>
    </ul>
  </nav>
</body>
</html>
