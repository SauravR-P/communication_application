<?php

// Funtion to save the filename and datetime in Database.
function upload_file($username,$fileName)
{
    // SQL Connection
    include '../helpers/sql_connection/db_connect.php';
    // Update user details in the database
    $sql = "INSERT INTO fileupload(Name,FileName) VALUES (:username,:fileName)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindparam(":username", $username);
    $stmt->bindparam(":fileName", $fileName);
    $stmt->execute();
}







