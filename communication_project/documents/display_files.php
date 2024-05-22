<?php

require ('./get_files.php');
include '../navbar/navbar.php'; 
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<h2 style='text-align: center;'>Welcome $username!</h2>";   
    echo "<h5 style='text-align: center;'>My Uploads ...</h5>"; 
    display_files_list($username);

} else {
    echo "No Session found.";
    // Redirect to login page or handle unauthorized access
    $targetURL = '../authorisation/login/login.html';
    header("Location: " . $targetURL);
    exit(); // Ensure that script execution stops after the redirect
}