<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if (isset($_GET['fileID']) && isset($_GET['newFileName'])) {
        $fileID = $_GET['fileID'];
        $newFileName = $_GET['newFileName'];

        edit_file($username, $fileID, $newFileName);

        echo "<div style='text-align: center; margin-top: 20px;'>";
        echo "<h2>Success!</h2>";
        echo "<h1>File name has been updated successfully.</h1>";
        echo "<h4>Please wait ! Redirecting to main page ...</h4>";
        echo "<script>
            setTimeout(function() {
                window.location.href = './display_files.php  '; 
            }, 2000);
        </script>";
        echo "</div>";
    } else {
        echo "Invalid request.";
    }
} else {
    echo "No Session found.";
    $targetURL = '../authorisation/login/login.html';
    header("Location: " . $targetURL);
    exit();
}

function edit_file($username, $fileID, $newFileName)
{
    if ($newFileName != "") {
        // SQL Connection
        include '../helpers/sql_connection/db_connect.php';
        // Update user details in the database
        $sql = "UPDATE fileupload SET FileName = :newFileName WHERE FileID = :fileID AND Name = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindparam(":username", $username);
        $stmt->bindparam(":fileID", $fileID);
        $stmt->bindparam(":newFileName", $newFileName);
        $stmt->execute();
    } else {
        echo "Name is required !!! ";
    }
}






