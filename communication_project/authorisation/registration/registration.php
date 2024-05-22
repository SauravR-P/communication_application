<?php

//registration page 
include '../../helpers/sql_connection/db_connect.php';

$registrationSuccessful = false;

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];


//Insert the input into DB.
try {
    $sql = "INSERT INTO user (Name, Email, Password) VALUES (:name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    // Bind parameters using bindParam
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $registrationSuccessful = true;
    $targetURL = '../login/login.html';
    header("Location: " . $targetURL);

    //Close Sql Connection
    $pdo = null;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}







