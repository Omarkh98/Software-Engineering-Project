<?php 
include 'User.php';
$User = user::DisplayAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Management</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/Home.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="Stars.css">
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post"action="UserController.php">
					<span class="login100-form-title p-b-49">
						User Management 
					</span>
                    <h4 style="font-family:Arial Black;">Please Select The User You Would Like to Either "Delete" or "Modify"</h4><br>
                    <select name="Drop">
                    <?php
                    for($i=0;$i<count($User);$i++){
                    echo "<option value=".$User[$i]->id.">" . $User[$i]->Fname. " " . $User[$i]->Lname."</option>";
                    }
                    ?>
                    </select>
                    <br><br>
                    
                <!-- Delete User -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="DeleteUser" value="Submit">
								Delete User
							</button>
						</div>
					</div><br>
                </form>
                <form class="login100-form validate-form" method="post"action="MainEditUser.php">
                <!-- Edit User Information -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="EditUser" value="Submit">
								Edit User Information
							</button>
						</div>
					</div><br>
				</form>
			</div>
		</div>
	</div>
    </body>
</html>