<?php


require('./create_table.php');
// Funtion to save the filename and datetime in Database.
function display_files_list($username)
{
    // SQL Connection
    include '../helpers/sql_connection/db_connect.php';
    // Update user details in the database
    $sql = "select * from FileUpload where Name =:username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindparam(":username", $username);
    if ($stmt->execute()) {
        $files = $stmt->fetchAll(PDO::FETCH_ASSOC);
         echo generate_table($files);
    } else {
        echo "Error, Please try again !";
    }
}







