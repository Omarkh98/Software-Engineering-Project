<?php 
include_once 'ConnectionClass.php';
include_once 'User.php';

$DB = new Database();
$DB = Database::GetInstance();
$User = new user();

if(isset($_POST["EditUserName"])){

$User->DropDown = $_POST["Drop"];

$FName = "";
$LName = "";
$Email = "";
$UserType = "";
$Id = "";
    
$Data = $User::GetUserInfo($User->DropDown);
    
for($i = 0; $i<count($Data); $i++){
     
    $FName = $Data[$i]['Fname'];
    $LName = $Data[$i]['Lname'];
    $Email = $Data[$i]['email'];
    $UserType = $Data[$i]['UserType'];
    $Id = $Data[$i]['id'];
}    
}  // Get User Information.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Management </title>
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
                    <h4 style="font-family:Arial Black;">Update The User's Information</h4><br>
                    <!-- User's First Name -->
					<div class="wrap-input100 validate-input m-b-23" data-validate = "WareHouse Name is reauired">
						<span class="label-input100">User's First Name</span>
						<input class="input100" type="text" name="fn" value="<?php echo $FName ?>">
                        <input class="input100" type="hidden" name="id" value="<?php echo $Id ?>">
						<span class="focus-input100" data-symbol="&#8594;"></span>
					</div>
                    <br>
                    <!-- User's Last Name -->
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "WareHouse Name is reauired">
						<span class="label-input100">User's Last Name</span>
						<input class="input100" type="text" name="ln" value="<?php echo $LName ?>">
						<span class="focus-input100" data-symbol="&#8594;"></span>
					</div>
                    <br>
                    <!-- User's Email Name -->
                  <div class="wrap-input100 validate-input m-b-23" data-validate = "WareHouse Name is reauired">
						<span class="label-input100">User's Email</span>
						<input class="input100" type="text" name="e" value="<?php echo $Email ?>">
						<span class="focus-input100" data-symbol="&#8594;"></span>
					</div>
                    <br>
                <div class="wrap-input100 validate-input m-b-23" data-validate = "WareHouse Name is reauired">
                        <span class="label-input100">User's Type</span>
                  <select name="Drop">
                    <?php 
                    $U = user::DisplayUserType();
                               
                    for($i=0;$i<count($U);$i++){
                    echo "<option value=".$U[$i]->id.">" . $U[$i]->Type."</option>";
                    }
                    ?>
                    </select>
                    </div>
                <!-- Update User Information -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="UpdateUser" value="Submit">
								Update !
							</button>
						</div>
					</div><br>
                </form>
			</div>
		</div>
	</div>
    </body>
</html>
