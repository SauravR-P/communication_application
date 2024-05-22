<?php
// Include the database connection
include '../helpers/sql_connection/db_connect.php';
include '../navbar/navbar.php'; 
echo '<br>';
echo '<br>';

// Check if user_id is provided in the query string
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Fetch user details based on user_id
    $sql = "SELECT * FROM user WHERE UserID = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user details were fetched successfully
    if ($user) {
        // Display user details in a form for editing
        echo "<form action='./update_user.php' method='POST' style='width: 50%; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9;'>";
        echo "<h2 style='text-align: center;'>Update User</h2>";
        echo "<label for='name' style='display: block; margin-bottom: 10px;'>Name:</label>";
        echo "<input type='text' id='name' name='name' value='" . htmlspecialchars($user['Name']) . "' style='width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;'>";
        echo "<label for='email' style='display: block; margin-bottom: 10px;'>Email:</label>";
        echo "<input type='email' id='email' name='email' value='" . htmlspecialchars($user['Email']) . "' style='width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;'>";
        echo "<label for='password' style='display: block; margin-bottom: 10px;'>Password:</label>";
        echo "<input type='password' id='password' name='password' value='" . htmlspecialchars($user['Password']) . "' style='width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;'>";
        echo "<input type='hidden' name='user_id' value='" . htmlspecialchars($user['UserID']) . "'>";
        echo "<input type='submit' value='Update' style='width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;'>";
        echo "</form>";
        
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}

