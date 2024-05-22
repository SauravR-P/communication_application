<?php

//Insert chat in DB.
function postChat($chat, $username)
{
    try {
        // SQL Connection
        include '../helpers/sql_connection/db_connect.php';
        // Insert chat in the database
        $sql = "INSERT INTO chat(Name,Chat) VALUES (:username,:chat)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindparam(":chat", $chat);
        $stmt->bindparam(":username", $username);
        $stmt->execute();
        //Close Sql Connection
        $pdo = null;
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
    }
}





