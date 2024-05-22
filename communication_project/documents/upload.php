<?php
require ("./upload_file.php");

session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<pre>";
    echo $_FILES['userfile']['error'];
    echo "<hr>";

    if ($_FILES['userfile']['error'] > 0) {
        switch ($_FILES['userfile']['error']) {
            case 1:
                echo "File exceeded upload_max_file_size";
                break;

            case 2:
                echo "File exceeded upload max_file_size";
                break;

            case 3:
                echo "File only partially uploaded";
                break;

            case 4:
                echo "no file uploaded";
                break;
        }
    }

    // MIME Type
    if ($_FILES['userfile']['type'] != 'image/png') {
        echo "Problem: File is not a PNG file";
        exit;
    }

    $document_path = $_SERVER['DOCUMENT_ROOT']; // /Applications/MAMP/htdocs
    $uploaded_file_path = $document_path . "/communication_project/uploaded_documents/" . $_FILES['userfile']['name'];

    //$_FILES['userfile']['name'];
    uploadFile($uploaded_file_path);    
    upload_file($username, $_FILES['userfile']['name']);
} else {
    echo "No Session found.";
    // Redirect to login page or handle unauthorized access
    $targetURL = '../authorisation/login/login.html';
    header("Location: " . $targetURL);
    exit(); // Ensure that script execution stops after the redirect
}

function uploadFile($uploaded_file_path)
{
    if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
        if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaded_file_path)) { // ?
            echo "Problem: Could not move file to destination directory";
            exit;
        }
    } else {
        echo "Problem: Possible file upload attack. Filename:";
        echo $_FILES['userfile']['name'];
        exit;
    }
    echo "<h1>File uploaded successfully</h1>";
    echo "<h3>Please wait ! Redirecting to main page ...</h3>";
    echo "<script>
    setTimeout(function() {
        window.location.href = './display_files.php  '; 
    }, 2000);
</script>";
}
