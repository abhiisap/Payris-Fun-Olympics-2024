<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Streams</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $(".comment-form").submit(function(event){
            event.preventDefault(); // Prevent default form submission
            var form = $(this);
            var commentText = form.find("textarea[name='comment']").val(); // Get comment text
            var commentHtml = "<div class='comment'>" + commentText + "</div>"; // Create comment HTML
            // Append comment to the comment section
            form.siblings(".comments").append(commentHtml);
            // Clear textarea after posting
            form[0].reset(); // Reset the form
            // Scroll to the bottom of the comment section
            form.siblings(".comments").scrollTop(form.siblings(".comments")[0].scrollHeight);
        });
    });
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('live.jpg'); /* Replace 'your-background-image-url.jpg' with the URL of your image */
            background-size: cover; /* Adjusts the background image size to cover the entire viewport */
            background-repeat: no-repeat; /* Prevents the background image from repeating */
            background-position: center; /* Centers the background image */
        }
        h2 {
            text-align: center;
            margin-top: 20px;
            color: white;
        }
        .video-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 60px;
            padding: 20px;
        }
        .video-card {
            width: calc(45% - 20px); /* Adjusted width */
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
            height: 600px; /* Adjust card height */
        }
        .video-card iframe {
            width: 100%;
            height: 70%;
            border: none;
        }
        .comments {
            max-height: 200px;
            overflow-y: auto;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .comment {
            margin-bottom: 5px;
            padding: 5px;
            background-color: #f9f9f9;
            border-radius: 5px;
            max-width: calc(100% - 20px); /* Limit the maximum width of comments */
            overflow-wrap: break-word; /* Ensure long comments wrap */
        }
        .comment-form {
        padding: 10px;
        background-color: #f2f2f2;
        /*height: 10px; /* Adjust height to auto */
        }
        .comment-form textarea {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            
        }
        .comment-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .comment-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Live Streams</h2>
    <div class="video-container">
        <?php
        // Database connection
        $conn = mysqli_connect("localhost", "root", "", "login_system");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch video IDs from the database
        $sql = "SELECT video_id FROM youtube_videos";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output iframe elements for each video ID
            while ($row = mysqli_fetch_assoc($result)) {
                $video_id = $row["video_id"];
                echo "<div class='video-card'>";
                echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$video_id' frameborder='0' allowfullscreen></iframe>";
                echo "<div class='comments'></div>"; // Comment section
                echo "<form class='comment-form'>";
                echo "<textarea name='comment' placeholder='Write your comment here...' rows='4' cols='50'></textarea><br>";
                echo "<input type='submit' value='Post Comment'>";
                echo "</form>";
                echo "</div>";    
            }
        } else {
            echo "No videos found.";
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
