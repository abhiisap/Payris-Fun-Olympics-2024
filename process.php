<?php
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Check if the form is a login or register form
    if (isset($_POST["login"])) {
        // Login form processing
        $email = $_POST["logEmail"];
        $password = $_POST["logPassword"];
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($query);

        // Check if the entered username and password match admin credentials
        if ($email === 'admin' && $password === 'admin') {
            // Redirect to admin dashboard
            $_SESSION['user_id'] = 'admin'; // Set a unique identifier for admin
            header("Location: admindash.php");
            exit();
        } else {

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    // Normal User Login successful
                    $_SESSION['user_id'] = $user['id'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                    // Invalid password
                    echo "Invalid email or password";
                }
            } else {
                // User not found
                echo "Invalid email or password";
            }
        }    
        
    } elseif (isset($_POST["register"])) {
        // Register form processing
        $username = $_POST["regUsername"];
        $email = $_POST["regEmail"];
        $password = $_POST["regPassword"];
        $confirmPassword = $_POST["confirmPassword"];
        $country = $_POST["regCountry"];
        $sports = $_POST["regSports"];
        $contact = $_POST["regContact"]; // Retrieve contact information
    
        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo "Error: Passwords do not match.";
        } else {
            // ReCAPTCHA verification
            $recaptchaSecretKey = "6LcPKjkpAAAAAIO3Qi0k27JXpNZhe5reW1TzqYbT";
            $recaptchaResponse = $_POST['g-recaptcha-response'];

            $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify";
            $recaptchaData = [
                'secret' => $recaptchaSecretKey,
                'response' => $recaptchaResponse,
            ];

            $recaptchaOptions = [
                'http' => [
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => http_build_query($recaptchaData),
                ],
            ];

            $recaptchaContext = stream_context_create($recaptchaOptions);
            $recaptchaResult = file_get_contents($recaptchaUrl, false, $recaptchaContext);
            $recaptchaResult = json_decode($recaptchaResult);

            if (!$recaptchaResult->success) {
                echo "Error: Please complete the reCAPTCHA verification.";
                exit;
            }

            // Hash the password before storing in the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, country, sports, contact) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $username, $email, $hashedPassword, $country, $sports, $contact);

            if ($stmt->execute()) {
                // Registration successful
                $_SESSION['user_id'] = $stmt->insert_id;
                header("Location: register.php");
                exit();
            } else {
                // Registration failed
                echo "Error: Registration failed. Please try again later.";
            }

            $stmt->close();
        }
    }

    $conn->close();
}

?>



