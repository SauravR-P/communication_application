<?php

// SQL Connection
include '../../helpers/sql_connection/db_connect.php';

// Login page 
$email = $_POST["email"];
$password = $_POST["password"];

//Fetch password from DB and validate with the inputs.
try {
    $sql = "SELECT Name, Email, Password FROM user WHERE Email = :email";     
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        // Verify password
        if ($password === $user['Password']) {
            // Start the session
            session_start();
            $_SESSION['username'] = $user['Name']; // Store username in session
            header("Location: ../../homePage/home_page.php");
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

