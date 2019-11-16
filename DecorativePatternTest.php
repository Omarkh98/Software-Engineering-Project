<?php // Products List
include_once 'ConnectionClass.php';
$DB = new Database();

$DB = Database::GetInstance();
            
$Query = "SELECT * FROM products";
$Result = mysqli_query($DB->GetConnection(),$Query);
?>

<html lang="en">
<head>
    <title> WareHouse Shipping </title>
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
				<form class="login100-form validate-form" method="post"action="DecorativePatternController.php">
					<span class="login100-form-title p-b-49">
				     Warehouse Shipping
					</span>
                    <!-- Product Name -->
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Product Name is reauired">
						<span class="label-input100">Product Name</span>
						<select name="Product">
                        <?php 
                        while($row = mysqli_fetch_array($Result)) {
                        echo "<option value=".$row['id'].">" . $row['Name']. "</option>";  
                        }
                        ?>
                        </select>
					</div>
                    <br>
                    <span class="label-input100">Proceed To Checkout</span>
                    <br><br>
                        <input type="checkbox" name="WH[]" value="T">Calculate Taxes Wrapper<br>
                    <br>
                        <input type="checkbox" name="WH[]" value="D">Calculate Discount Wrapper<br>
                    <br>
                        <input type="checkbox" name="WH[]" value="S">Calculate Shipping Wrapper<br>
                <br> <br>
                <div class="container-login100-form-btn">
				       <div class="wrap-login100-form-btn">
				          <div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="Checkout">
								Checkout
							</button>
						</div>
                    </div>
				</form>
			</div>
		</div>
	</div>
    </body>
</html>