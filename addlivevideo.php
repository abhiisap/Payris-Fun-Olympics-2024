<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add YouTube Video</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('add.jpg'); /* Specify the path to your background image */
            background-size: cover; /* Cover the entire viewport */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
            text-align: center;
        }
        h2 {
            margin-top: 0;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: calc(100% - 10px);
            margin: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .back-link {
            display: block;
            text-decoration: none;
            color: #333;
            margin-top: 10px;
        }
        .back-link i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Video</h2>
        <form action="add_video_backend.php" method="POST">
            <label for="video_id">Enter Video ID:</label><br>
            <input type="text" id="video_id" name="video_id" required><br><br>
            <input type="submit" value="Add Video">
        </form>
        <a href="admindash.php" class="back-link"><i class="fas fa-arrow-left"></i>Back to Dashboard</a>
    </div>
</body>
</html>
