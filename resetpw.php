<?php
// Initialize variables
$message = '';
$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $new_password = $_POST["new_password"];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_system";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to check if email exists
    $check_sql = "SELECT email FROM login_system WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);

    if ($check_stmt === false) {
        // Handle prepare error
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameter for email check
    $check_stmt->bind_param("s", $email);

    // Execute the check statement
    $check_stmt->execute();
    $check_stmt->store_result();

    // If email exists, proceed with password reset
    if ($check_stmt->num_rows > 0) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Prepare SQL statement to update password
        $update_sql = "UPDATE login_system SET password = ? WHERE email = ?";
        $update_stmt = $conn->prepare($update_sql);

        if ($update_stmt === false) {
            // Handle prepare error
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters for password update
        $update_stmt->bind_param("ss", $hashed_password, $email);

        // Execute the update statement
        if ($update_stmt->execute()) {
            $message = "Password reset successfully!";
            // Close update statement
            $update_stmt->close();
            // Redirect to admin dashboard after a delay
            echo '<script>
                    setTimeout(function() {
                        window.location.href = "admindash.php";
                    }, 3000); // 3000 milliseconds delay (3 seconds)
                  </script>';
        } else {
            $error_message = "Failed to reset password. Please try again.";
        }
    } else {
        // If email doesn't exist, display error message
        $error_message = "Email not found. Please enter a registered email.";
    }

    // Close check statement
    $check_stmt->close();

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    <div class="container">
        <h2>Password Reset</h2>
        <?php if(isset($message)) { ?>
            <div class="success-message"><?php echo $message; ?></div>
        <?php } ?>
        <?php if(isset($error_message)) { ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
