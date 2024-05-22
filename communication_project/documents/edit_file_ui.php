<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $fileID = $_GET['id']; // Get file ID from the URL
} else {
    echo "No Session found.";
    $targetURL = '../authorisation/login/login.html';
    header("Location: " . $targetURL);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container div {
            margin-bottom: 15px;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit File Name</h2>
        <form action="./edit_file.php" method="GET">
            <input type="hidden" name="fileID" value="<?php echo htmlspecialchars($fileID); ?>">
            <div>
                <label for="newFileName">New File Name:</label>
                <input type="text" id="newFileName" name="newFileName" required>
            </div>
            <div>
                <button type="submit">Update File Name</button>
            </div>
        </form>
    </div>
</body>
</html>
