<?php

include '../helpers/sql_connection/db_connect.php';
include './create_table.php';
include '../navbar/navbar.php'; 


try {
    $sql = "SELECT * FROM user ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo generateUserTable($users);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}