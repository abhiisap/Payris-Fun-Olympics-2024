<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script>
        // JavaScript function to navigate back to the previous page
        function goBack() {
            window.history.back();
        }

		$(document).ready(function(){
			$("#regPassword").on("keyup", function(){
				var password = $(this).val();
				var strength = 0;
				
				if (password.length >= 8) {
					strength += 1;
				}
				if (password.match(/([a-z])/)) {
					strength += 1;
				}
				if (password.match(/([A-Z])/)) {
					strength += 1;
				}
				if (password.match(/([0-9])/)) {
					strength += 1;
				}
				if (password.match(/([!@#$%^&*()])/)) {
					strength += 1;
				}
				if (strength == 1) {
					$("#password_strength").html("very weak");
					$("#password_strength").css("color", "dark red");
				} else if (strength == 2) {
					$("#password_strength").html("Weak");
					$("#password_strength").css("color", "red");
				} else if (strength == 3) {
					$("#password_strength").html("Moderate");
					$("#password_strength").css("color", "orange");
				} else if (strength == 4) {
					$("#password_strength").html("Strong");
					$("#password_strength").css("color", "green");
				} else if (strength == 5) {
					$("#password_strength").html("Very Strong");
					$("#password_strength").css("color", "darkgreen");
				} else {
					$("#password_strength").html("");
				}
			});

			$("#confirmPassword").on("keyup", function(){
                var confirmPassword = $(this).val();
			    var password = $("#regPassword").val();

				if (password === confirmPassword) {
					$("#password_match").html("Passwords match");
					$("#password_match").css("color", "green");
				} else {
					$("#password_match").html("Passwords do not match");
					$("#password_match").css("color", "red");
				}
			});
		});
		
	    
        

        

        function login() {
            var x = document.getElementById('login');
            var y = document.getElementById('register');
            var z = document.getElementById('btn');

            x.style.left = "27px";
            y.style.right = "-350px";
            z.style.left = "0px";
        }

        function register() {
            var x = document.getElementById('login');
            var y = document.getElementById('register');
            var z = document.getElementById('btn');

            x.style.left = "-350px";
            y.style.right = "25px";
            z.style.left = "150px";
        }

        function myLogPassword() {
            var a = document.getElementById("logPassword");
            var b = document.getElementById("eye");
            var c = document.getElementById("eye-slash");

            if (a.type === "password") {
                a.type = "text";
                b.style.opacity = "0";
                c.style.opacity = "1";
            } else {
                a.type = "password";
                b.style.opacity = "1";
                c.style.opacity = "0";
            }
        }

        function myRegPassword() {
            var d = document.getElementById("regPassword");
            var b = document.getElementById("eye-2");
            var c = document.getElementById("eye-slash-2");

            if (d.type === "password") {
                d.type = "text";
                b.style.opacity = "0";
                c.style.opacity = "1";
            } else {
                d.type = "password";
                b.style.opacity = "1";
                c.style.opacity = "0";
            }
        }

        function myConfirmPasswordClick() {
            var e = document.getElementById("confirmPassword");
            var b = document.getElementById("eye-3");
            var c = document.getElementById("eye-slash-3");

            if (e.type === "password") {
                e.type = "text";
                b.style.opacity = "0";
                c.style.opacity = "1";
            } else {
                e.type = "password";
                b.style.opacity = "1";
                c.style.opacity = "0";
            }
        }

        


    </script>
</head>
<body>
    <button class="back-button" onclick="goBack()">Back</button>

    
    <div class="container">
        <div class="box">
            <div class="box-login" id="login">
                <div class="top-header">
                    <h3>Hello, Again!</h3>
                    <small>We are happy to have you back.</small>
                </div>
                <form action="process.php" method="post">
                    <div class="input-group">
                        <div class="input-field">
                            <input type="text" class="input-box" id="logEmail" name="logEmail" required>
                            <label for="logEmail">Email address</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input-box" id="logPassword" name="logPassword" required>
                            <label for="logPassword">Password</label>
                            <div class="eye-area">
                                <div class="eye-box" onclick="myLogPassword()">
                                    <i class="fa-regular fa-eye" id="eye"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        <div class="remember">
                            <input type="checkbox" id="formCheck" class="check">
                            <label for="formCheck">Remember Me</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="input-submit" value="Log In" name="login" required>
                        </div>
                    </div>
                    <div class="forgot">
                        <a href="#">Forgot password?</a>
                    </div>
                </form>
            </div>

            <div class="box-register" id="register">
                <div class="top-header">
                    <h3>Sign Up, Now!</h3>
                    <small>We are happy to have you with us.</small>
                </div>
                <form class="input-group" action="process.php" method="post" onsubmit="return validatePassword()">
                    <div class="input-field">
                        <input type="text" class="input-box" id="regUsername" name="regUsername" required>
                        <label for="regUsername">Username</label>
                    </div>

                    <div class="input-field">
                        <!-- Dropdown for selecting country -->
                        <select class="input-box" id="regCountry" name="regCountry" required>
                            <option value="" selected disabled>Select your country</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <!-- Add more countries -->
                            <option value="Argentina">Argentina</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="Egypt">Egypt</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Russia">Russia</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Spain">Spain</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <!-- Add more countries as needed -->
                        </select>
                    </div>

                    <div class="input-field">
                        <!-- Dropdown for selecting sports -->
                        <select class="input-box" id="regSports" name="regSports" required>
                            <option value="" selected disabled>Select your favorite sport</option>
                            <option value="Football">Football</option>
                            <option value="Basketball">Basketball</option>
                            <option value="Tennis">Tennis</option>
                            <!-- Add more sports -->
                            <option value="Golf">Golf</option>
                            <option value="Baseball">Baseball</option>
                            <option value="Hockey">Hockey</option>
                            <option value="Cricket">Cricket</option>
                            <option value="Rugby">Rugby</option>
                            <option value="Volleyball">Volleyball</option>
                            <option value="Soccer">Soccer</option>
                            <option value="Swimming">Swimming</option>
                            <option value="Athletics">Athletics</option>
                            <option value="Boxing">Boxing</option>
                            <option value="Cycling">Cycling</option>
                            <option value="Gymnastics">Gymnastics</option>
                            <option value="Wrestling">Wrestling</option>
                            <option value="Weightlifting">Weightlifting</option>
                            <option value="Martial Arts">Martial Arts</option>
                            <option value="Skiing">Skiing</option>
                            <option value="Snowboarding">Snowboarding</option>
                            <option value="Surfing">Surfing</option>
                            <option value="Skateboarding">Skateboarding</option>
                            <option value="Taekwondo">Taekwondo</option>
                            <option value="Judo">Judo</option>
                            <option value="Karate">Karate</option>
                            <option value="Fencing">Fencing</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Table Tennis">Table Tennis</option>
                            <option value="Golf">Golf</option>
                            <option value="Archery">Archery</option>
                            <option value="Billiards">Billiards</option>
                            <option value="Bowling">Bowling</option>
                            <option value="Canoeing">Canoeing</option>
                            <option value="Kayaking">Kayaking</option>
                            <option value="Rowing">Rowing</option>
                            <option value="Sailing">Sailing</option>
                            <option value="Diving">Diving</option>
                            <option value="Snooker">Snooker</option>
                            <option value="Softball">Softball</option>
                            <option value="Squash">Squash</option>
                            <option value="Sumo">Sumo</option>
                            <option value="Handball">Handball</option>
                            <option value="Polo">Polo</option>
                            <option value="Lacrosse">Lacrosse</option>
                            <option value="Polo">Polo</option>
                            <option value="Shooting">Shooting</option>
                            <option value="Tae Bo">Tae Bo</option>
                            <option value="Triathlon">Triathlon</option>
                            <option value="Yoga">Yoga</option>
                            <option value="Pilates">Pilates</option>
                            <option value="Parkour">Parkour</option>
                            <option value="Rock Climbing">Rock Climbing</option>
                            <option value="Mountaineering">Mountaineering</option>
                            <option value="Bouldering">Bouldering</option>
                            <option value="Skydiving">Skydiving</option>
                            <option value="Bungee Jumping">Bungee Jumping</option>
                            <option value="Paragliding">Paragliding</option>
                            <option value="Kiteboarding">Kiteboarding</option>
                            <option value="Windsurfing">Windsurfing</option>
                            <option value="Sailing">Sailing</option>
                            <option value="Motor Racing">Motor Racing</option>
                            <option value="Formula 1">Formula 1</option>
                            <option value="NASCAR">NASCAR</option>
                            <option value="Rallying">Rallying</option>
                            <option value="Drag Racing">Drag Racing</option>
                            <option value="Motocross">Motocross</option>
                            <option value="BMX">BMX</option>
                            <option value="Skateboarding">Skateboarding</option>
                            <option value="Snowmobiling">Snowmobiling</option>
                            <option value="Ice Skating">Ice Skating</option>
                            <option value="Figure Skating">Figure Skating</option>
                            <option value="Speed Skating">Speed Skating</option>
                            <option value="Synchronized Swimming">Synchronized Swimming</option>
                            <option value="Water Polo">Water Polo</option>
                            <option value="Surfing">Surfing</option>
                            <!-- Add more sports as needed -->
                        </select>
                    </div>

                    <div class="input-field">
                        <input type="text" class="input-box" id="regContact" name="regContact" required>
                        <label for="regContact">Contact</label>
                    </div>



                    <div class="input-field">
                        <input type="text" class="input-box" id="regEmail" name="regEmail" required>
                        <label for="regEmail">Email address</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input-box" id="regPassword" name="regPassword" required oninput="checkPasswordStrength()">
                        <label for="regPassword">Password</label>
                        <span id="password_strength"></span><br><br>
                        <div class="eye-area">
                            <div class="eye-box" onclick="myRegPassword()">
                                <i class="fa-regular fa-eye" id="eye-2"></i>
                                <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                            </div>
                        </div>
                    </div>

                    

                    <div class="input-field">
                        <input type="password" class="input-box" id="confirmPassword" name="confirmPassword" required oninput="myConfirmPassword()">
                        <label for="confirmPassword">Confirm Password</label>
                        <div class="eye-area">
                            <div class="eye-box" onclick="myConfirmPasswordClick()">
                                <i class="fa-regular fa-eye" id="eye-3"></i>
                                <i class="fa-regular fa-eye-slash" id="eye-slash-3"></i>
                            </div>
                        </div>
                        <div id="password_match"></div>
                    </div>



                    
                    <div class="g-recaptcha" data-sitekey="6LcPKjkpAAAAANzCnQYv_l40nLSFLm0xPBITQYWD"></div>

                    
                    <div class="input-field">
                        <input type="submit" class="input-submit" name="register" value="Sign Up" required>
                    </div>
                </form>
            </div>

            <div class="switch">
                <a href="#" class="login active" onclick="login()">Login</a>
                <a href="#" class="register" onclick="register()">Register</a>
                <div class="btn-active" id="btn"></div>
            </div>
        </div>
    </div>

       

    
</body>
</html>