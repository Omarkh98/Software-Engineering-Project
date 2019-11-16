<?php 
include_once 'ConnectionClass.php';
include_once 'WareHouse.php';

$DB = new Database();
$W = new warehouse();

if(isset($_POST["EditProduct"])){

$W->DropDown = $_POST["Drop"];

$Name = "";
$Quantity = "";
$Id = "";
    
$Data = $W::GetProductInfo($W->DropDown);
    
for($i = 0; $i<count($Data); $i++){
    
    $Name = $Data[$i]['Name'];
    $Quantity = $Data[$i]['Quantity'];
    $Id = $Data[$i]['id'];
}
}  // Get Products Information.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> WareHouse - Add Products </title>
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
				<form class="login100-form validate-form" method="post"action="WareHouseController.php">
					<span class="login100-form-title p-b-49">
				     Add Products
					</span>
                    <!-- Product Name -->
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Product Name is reauired">
						<span class="label-input100">Product Name</span>
						<input class="input100" type="text" name="Name" placeholder="  Enter the PRODUCT name" value="<?php echo $Name ?>">
                        <input class="input100" type="hidden" name="id" value="<?php echo $Id ?>">
						<span class="focus-input100" data-symbol="&#8594;"></span>
					</div>
                    <br>
                    
                    <!-- Product Quantity -->
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Product Quantity is reauired">
						<span class="label-input100">Product Quantity</span>
						<input class="input100" type="text" name="Quantity" placeholder="  Enter the Products QUANTITY" value="<?php echo $Quantity ?>">
                        <input class="input100" type="hidden" name="id" value="<?php echo $Id ?>">
						<span class="focus-input100" data-symbol="&#x2612;"></span>
					</div>
                    <br>

                    <!-- Submit Button -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="ModifyProduct" value="Submit">
								Modify Product
							</button>
						</div>
					</div><br>
				</form>
			</div>
		</div>
	</div>
    </body>
</html>