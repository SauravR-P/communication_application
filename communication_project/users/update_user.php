<?php
// Include the database connection
include '../helpers/sql_connection/db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Server-side validation for empty fields
    $errors = [];
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        // Update user details in the database
        $sql = "UPDATE user SET Name = :name, Email = :email, Password = :password WHERE UserID = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            echo "<h2 style='text-align: center; color: #28a745;'>User updated successfully.</h2>";
            echo "<div style='text-align: center; margin-top: 20px;'>";
            echo "<a href='./get_users.php' style='display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; color: #fff; background-color: #007bff; border: none; border-radius: 5px;'>Go back to user list</a>";
            echo "</div>";
        } else {
            echo "<h2 style='text-align: center; color: #dc3545;'>Error updating user.</h2>";
        }
    } else {
        // Display errors
        echo "<div style='width: 50%; margin: 20px auto; padding: 20px; border: 1px solid #dc3545; border-radius: 10px; background-color: #f8d7da; color: #721c24;'>";
        echo "<h2 style='text-align: center;'>Errors</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<div style='text-align: center; margin-top: 20px;'>";
        echo "<a href='./get_users.php' style='display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; color: #fff; background-color: #007bff; border: none; border-radius: 5px;'>Go back to user list</a>";
        echo "</div>";
        echo "</div>";
    }
}



