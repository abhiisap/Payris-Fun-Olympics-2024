<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "login_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve video ID from the form
$video_id = $_POST["video_id"];

// Insert video ID into the database
$sql = "INSERT INTO youtube_videos (video_id) VALUES ('$video_id')";

if (mysqli_query($conn, $sql)) {
    echo "Video added successfully.";
} else {
    echo "Error adding video: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>