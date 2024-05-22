<?php
$dbHost = "localhost";
$dbName = "user";
$dbUser = "root";      //by default root is user name.  
$dbPassword = "";     //password is blank by default  
$dbPort = 3308;


try {
    $pdo  = new PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort", $dbUser, $dbPassword);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error handling mode
    // ... Rest of your code using $dbConn
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    // Handle connection errors here
  }