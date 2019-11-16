<?php 
include 'WareHouse.php';
$WH = warehouse::DisplayAll();
$Product = warehouse::GetProductType();
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
				<form class="login100-form validate-form" method="post"action="WareHouseController.php" onsubmit="return registrationValidate();">
					<span class="login100-form-title p-b-49">
				     Add Products
					</span>
                    <!-- Product Name -->  <span class="error"></span>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Product Name is reauired">
						<span class="label-input100">Product Name</span>
						<input class="input100" type="text" name="Name" id="firstName" placeholder="  Enter the PRODUCT name" value="" onblur="checkFName()">
						<span class="focus-input100" data-symbol="&#8594;"></span>
                        <p id ="fNameError"></p>
					</div>
                    <br>
                    
                    <!-- Select Type -->
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Product Type is required">
						<span class="label-input100">Select Product Type</span>
                        <select style="margin-right: 10px; margin-left: 10px;" id="Type" name="Type">
                        <?php
                       for($i=0;$i<count($Product);$i++){
                       echo "<option value=".$Product[$i]->PID.">" . $Product[$i]->PNAME."</option>";
                        }   
                        ?> 
                        </select>  
					</div>
                    <br>
                    
                    <!-- Product Quantity -->
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Product Quantity is reauired">
						<span class="label-input100">Products Quantity</span>
						<input class="input100" type="number" id="product" name="Quantity" placeholder="  Enter the Products QUANTITY " value="" min=1>
						<span class="focus-input100" data-symbol="&#x2612;"></span>
					</div>
                    <br>
                    <!-- Select WareHouse -->
                    <h5>* Please Select The WareHouse You Would Like To Add the Product to</h5><br>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "WareHouse Name is reauired">
                    <select name="Drop">
                    <?php 
                    for($i=0;$i<count($WH);$i++){
                    echo "<option value=".$WH[$i]->id.">" . $WH[$i]->WHname."</option>";
                    }
                    ?>
                    </select>
                </div>
                    
                    <!-- Submit Button -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="AddProduct" value="Submit">
								Add Product
							</button>
						</div>
					</div><br>
				</form>
			</div>
		</div>
	</div>
    </body>
</html>
<script type="text/javascript">
        var fcheck = false;

        function checkFName() {
            document.getElementById("fNameError").innerHTML = null;
            var fName = document.getElementById("firstName");
            var letters = /^[A-Za-z]+$/;

            if (!fName.value.match(letters)) {
                error = "Product Name Can only be Alphabets";
                document.getElementById("fNameError").innerHTML = error;
                fName = null;
                return false;
            }

            if ((fName.value.length) < 2) {
                error = "Product Name is too short";
                document.getElementById("fNameError").innerHTML = error;
                fName = null;
                return false;
            }
            fcheck = true;
            return true;
        }
    
    
        function registrationValidate() {
            if (fcheck) {
                return true;
            } else {
                alert(fcheck);
                return false;
            }
        }      
</script>