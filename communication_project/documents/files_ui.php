<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: block;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar .nav-links {
            display: flex;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .upload-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-top: 20px; /* Adjusted to add space below the navbar */
        }

        .upload-container label {
            font-size: 18px;
            display: block;
            margin-bottom: 15px;
        }

        .upload-container input[type="file"] {
            display: block;
            margin: 0 auto 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        .upload-container input[type="submit"],
        .upload-container .view-uploads {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .upload-container input[type="submit"]:hover,
        .upload-container .view-uploads:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include '../navbar/navbar.php'; ?>

    <div class="container">
        <div class="upload-container">
            <form action="./upload.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <label for="file-upload">Upload a file</label>
                <input type="file" name="userfile" id="file-upload">
                <input type="submit" value="Upload File">
            </form>
            <button class="view-uploads" onclick="window.location.href='./display_files.php'">Display My Uploads</button>
        </div>
    </div>
</body>

</html>
