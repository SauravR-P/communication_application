<?php

 // Delete operation 

delete_file();
function delete_file()
{
   // Include your database connection
    include '../helpers/sql_connection/db_connect.php'; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        //Delete file from database.
        $sql = "DELETE FROM FileUpload WHERE FileID = :id";
        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {

            //Close Sql Connection
            $pdo = null;
            echo "<h1>File deleted successfully </h1>";
            echo "<h3>Please wait ! Redirecting to main page ...</h3>";
            echo "<script>
            setTimeout(function() {
                window.location.href = './display_files.php  '; 
            }, 2000);
        </script>";

        } else {
            echo "Error deleting file.";
        }
    } else {
        echo "No file ID provided.";
    }
    exit();

    
}