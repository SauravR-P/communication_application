<?php

include '../helpers/sql_connection/db_connect.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    try {
        $sql = "DELETE FROM user where UserID = :userid ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userid', $user_id);
        $stmt->execute();
        echo "<h2 style='text-align: center; color: #dc3545;'>User Deleted Successfully!</h2>";
        echo "<div style='text-align: center; margin-top: 20px;'>";
        echo "<a href='./get_users.php' style='display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; color: #fff; background-color: #007bff; border: none; border-radius: 5px;'>Go back to user list</a>";
        echo "</div>";



    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "User ID not provided.";
}


