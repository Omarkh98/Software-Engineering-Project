<!DOCTYPE html>
<html lang="en">
<head>
    <title>WareHouse Control Panel</title>
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
				<form class="login100-form validate-form" method="post"action="AdminController.php">
					<span class="login100-form-title p-b-49">
						WareHouse Control Panel 
					</span>
                    
                    <!-- Add / Edit / Delete Warehouses -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="Manage" value="Submit">
								WareHouse Management
							</button>
						</div>
					</div><br>
                    
                <!-- Add Products -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="Add" value="Submit">
								Add Products
							</button>
						</div>
					</div><br>
                <!-- View Stats -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="Statistics" value="Submit">
								View WareHouse Statistics
							</button>
						</div>
					</div><br>
                <!-- Manade / Edit -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="Edit" value="Submit">
								Manage WareHouse Products
							</button>
						</div>
					</div><br>
                </form>
			</div>
		</div>
	</div>
    </body>
</html>