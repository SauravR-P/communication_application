<?php

include './create_table.php';

//Fetch all chats and display
function getChats($username)
{
    // SQL Connection
    include '../helpers/sql_connection/db_connect.php';
    // Get Chats details in the database
    $sql = "SELECT * FROM chat order by ChatID desc ";
    $stmt = $pdo->prepare($sql);
    // Execute the query
    if ($stmt->execute()) {
        $chats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo generateChatTable($chats);
        //Close Sql Connection
        $pdo = null;
    } else {
        echo "Error, Please try again !";
    }
}





