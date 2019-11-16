<?php
include_once 'User.php';

$User = user::DisplayGender();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up </title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/Home.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>
    	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post" name="SignUp" id="SignUpForm" action="UserController.php" onsubmit="return registrationValidate();">
					<span class="login100-form-title p-b-49">
						Sign Up
					</span>
                    <!-- First Name -->
					<div class="wrap-input100 validate-input m-b-23" data-validate = "First Name is reauired">
						<span class="label-input100">First name</span>
						<input class="input100" type="text" name="Fname" id = "firstName" placeholder="  Type your FIRST name"
                        value="" onblur="checkFName()">
						<span class="focus-input100" data-symbol="&#8594;"></span>
                        <p id="fNameError"></p>
					</div>
                    
                    <!-- Last Name -->
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Last Name is required">
						<span class="label-input100">Last Name</span>
						<input class="input100" type="text" name="Lname" id = "lastName" placeholder="  Type your LAST name" 
                        value="" onblur="checkLName()">
						<span class="focus-input100" data-symbol="&#8594;"></span>
                        <p id ="lNameError"></p>
					</div>
                    
                    <!-- Email -->
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Email Address is required">
						<span class="label-input100">Email Address</span>
						<input class="input100" type="email" name="Email" id = "email" placeholder="  Type your EMAIL address" value="" onblur="checkEmail()">
						<span class="focus-input100" data-symbol="&#x1F4E7;"></span>
                        <p id ="emailError"></p>
					</div>
                    
                    <!-- Password -->
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="Password" id = "password" placeholder="  Type your PASSWORD" value="" onblur="checkPassword()">
						<span class="focus-input100" data-symbol="&#x1f512;"></span>
                        <p id ="passwordError"></p>
					</div><br>
                
                    
                    <!-- Gender -->
					<div class="wrap-input100 validate-input" data-validate="Gender is required">
						<select name="gender">
                        <?php
                        for($i=0;$i<count($User);$i++){
                        echo "<option value=".$User[$i]->id.">" . $User[$i]->GenderID."</option>";
                        }
                        ?>

				</select>	</div><br><br>
					
                    <!-- Sign Up Button -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="SignUP">
								Sign Up
							</button>
						</div>
					</div>
                    
					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>
					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    </body>
</html>
<!--Validations -->
<script type="text/javascript">
        var fcheck = false;
        var lcheck = false;
        var echeck = false;
        var pacheck = false;

        function checkFName() {
            document.getElementById("fNameError").innerHTML = null;
            var fName = document.getElementById("firstName");
            var letters = /^[A-Za-z]+$/;

            if (!fName.value.match(letters)) {
                error = "First Name Can only be Alphabets";
                document.getElementById("fNameError").innerHTML = error;
                fName = null;
                return false;
            }

            if ((fName.value.length) < 2) {
                error = "First Name is too short";
                document.getElementById("fNameError").innerHTML = error;
                fName = null;
                return false;
            }
            fcheck = true;
            return true;
        }

        function checkLName() {
            document.getElementById("lNameError").innerHTML = null;
            var lName = document.getElementById("lastName");
            var letters = /^[A-Za-z]+$/;

            if (!lName.value.match(letters)) {
                error = "Last Name Can only be Alphabets";
                document.getElementById("lNameError").innerHTML = error;
                lName = null;
                return false;
            }

            if ((lName.value.length) < 2) {
                error = "Last Name is too short";
                document.getElementById("lNameError").innerHTML = error;
                lName = null;
                return false;
            }
            lcheck = true;
            return true;
        }


        function checkEmail() {
            document.getElementById("emailError").innerHTML = null;
            var email = document.getElementById("email");
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            if (!email.value.match(mailformat)) {
                error = "Please Enter a Valid Email Address";
                document.getElementById("emailError").innerHTML = error;
                email = null;
                return false;
            }
            echeck = true;
            return true;
        }

        function checkPassword() {
            document.getElementById("passwordError").innerHTML = null;
            var password = document.getElementById("password");

            if ((password.value.length) < 8) {
                error = "Password Should be at Least 8 Characters Long";
                document.getElementById("passwordError").innerHTML = error;
                password = null;
                return false;
            }
            pacheck = true;
            return false;
        }

        function registrationValidate() {
            if (fcheck && lcheck && echeck && pacheck) {
                return true;
            } else {
                alert(echeck);
                return false;
            }
        }      
</script>