<!DOCTYPE html>
<html lang="en">
<head>
    <title>LogIn </title>
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
				<form class="login100-form validate-form" method="post" action="UserController.php" onsubmit="return registrationValidate();"> 
					<span class="login100-form-title p-b-49">
						Login
					</span>

                    <!-- Email -->
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Email Address is required">
						<span class="label-input100">Email Address</span>
						<input class="input100" type="email" name="Email" id="email" placeholder="  Type your EMAIL address" value="" onblur="checkEmail()">
						<span class="focus-input100" data-symbol="&#x1F4E7;"></span>
                        <p id ="emailError"></p>
					</div>
                    
                    <!-- Password -->
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="Password" placeholder="Type your PASSWORD" value="">
						<span class="focus-input100" data-symbol="&#x1f512;"></span>
                        <span class="error" style="color:purple;"></span>
					</div><br> 
                    
                    <!-- Remember Me -->
					<label><input id="rememberme" name="rememberme" value="remember" type="checkbox" /> &nbsp;Remember me</label><br><br> 
                    
                    <!-- Log In Button -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="Login">
								Log In
							</button>
						</div>
					</div>
                    <br>
                    <!-- Forgot Password -->
                    <div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
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

<script type="text/javascript">
        var echeck = false;

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


        function registrationValidate() {
            if (echeck) {
                return true;
            } else {
                alert(echeck);
                return false;
            }
        }      
</script>