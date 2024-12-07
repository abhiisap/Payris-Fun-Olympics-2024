<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admindash.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Function to handle click event on "Reset Password" card
        function openResetPasswordPage(event) {
            // Prevent default behavior of the link
            event.preventDefault();
            // Redirect to the reset password page
            window.location.href = 'resetpw.php';
        }
    </script>
</head>
<body>

<input type="checkbox" id="nav-toggle"> 

<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span class="lab la-accusoft"></span><span id="kleenpulse">Hello</span></h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="#" class="active"><span class="las la-igloo"></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#"><span class="las la-clipboard-list"></span>
                    <span>Viewers</span>
                </a>
            </li>
            <li>
                <a href="#"><span class="las la-shopping-bag"></span>
                    <span>Streams</span>
                </a>
            </li>
            <li>
                <a href="#"><span class="la la-user-circle"></span>
                    <span>Accounts</span>
                </a>
            </li>
            <li>
                <a href="#"><span class="las la-clipboard"></span>
                    <span>Task</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="main-content">
    <header>
        <h2 class="heading" id="dashboard">
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label>
            Dashboard
        </h2>
        <div class="search">
            <div class="icon"></div>
            <div class="input">
                <input type="text" placeholder="search" id="mysearch" autocomplete="off">
            </div>
            <span class="clear" onclick="reset()"></span>
        </div>
        <div class="user-wrapper">
            <img src="https://assets.codepen.io/3853433/internal/avatars/users/default.png?format=auto&version=1617122449&width=40&height=40" alt="">
            <div>
                <h4>Abhinav Sapkota</h4>
                <small>Main Boss</small>
            </div>
        </div>
    </header>
    <main>
        <div id="pop-wrap">
            <h1 class="pop-up">Light Mode Activated</h1>
        </div>
        <div class="switch" id="switch">
            <div id="toggle">
                <i class="indicator"></i>
            </div>
        </div>
        <div class="cards">
            <div class="card-single">
				<a href="addlivevideo.php">
                <div>
                    <span><b style="font-size: 1.2em;">Add Video</b></span>
                </div>
				
                <div></div>
				</a>
            </div>
           
            <div class="card-single">
                <a href="#" class="reset-password-link" onclick="openResetPasswordPage(event)">
                    <div>
                        <span><b style="font-size: 1.2em;">Reset Password</b></span>
                    </div>
                    <div></div>
                </a>
            </div>

			<div class="card-single">
    			<a href="logout.php">
        			<div>
            			<span><b style="font-size: 1.2em;">LogOut</b></span>
        			</div>
        			<div></div> 
    			</a>
			</div>


            <div class="card-single">
                <div>
                    <h1><sup>$</sup><p id="income"><b>k</b></p></h1>
                    <span><b style="font-size: 1.2em;">Weekly Income</b></span>
                </div>
                <div></div>
            </div>
        </div>
        <div class="recent-grid">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h3 class="heading">User Interactions</h3>
                        <button>See all <span class="las la-arrow-right"></span></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td><b>ID</b></td>
                                        <td><b>Username</b></td>
                                        <td><b>Email</b></td>
										<td><b>Country</b></td>
                                        <td><b>Sports</b></td>
                                        <td><b>Contact</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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

                                    // Retrieve user information from the database
                                    $sql = "SELECT id, username, email, country, sports, contact FROM users";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td><td>" . $row["country"] . "</td><td>" . $row["sports"] . "</td><td>" . $row["contact"] . "</td></tr>";
                                        }
                                        
                                    } else {
                                        echo "0 results";
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="admindash.js"></script>
</body>
</html>
