<?php

// Home Page UI 
// Start the session
session_start();
// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    // Access the username
    $username = $_SESSION['username'];
    echo "<h1> Welcome, $username! </h1>";
    //Including Index 
    include './home_index.php';
} else {
    // Redirect to login page
    $targetURL = '../authorisation/login/login.html';
    header("Location: " . $targetURL);
    exit(); 
}
//Including logout button
include './home_logout.php';
