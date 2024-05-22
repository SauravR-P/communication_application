<?php


// Start session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

echo "Logout Succesfull !";

// Redirect to login page 
$targetURL = '../login/login.html';
header("Location: " . $targetURL);
exit();
