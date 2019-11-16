<?php 
include_once 'ConnectionClass.php';
include_once 'WareHouse.php';

$DB = new Database();
$W = new warehouse();

if(isset($_POST["Manage"])){

$W->DropDown = $_POST["Drop"];

$Name = "";
$Id = "";
    
$Data = $W::GetProducts($W->DropDown);
    
for($i = 0; $i<count($Data); $i++){
    
    $Name = $Data[$i]['Name'];
    $Id = $Data[$i]['id'];
}
}  // Get Products Information.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products Management </title>
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
				<form class="login100-form validate-form" method="post"action="WareHouseProducts.php">
					<span class="login100-form-title p-b-49">
						WareHouse Products 
					</span>
                    <!-- Products of this particular Warehouse --> 
                     <h5>* Please Select The Product You Would Like To Modify</h5><br>
                    <select name="Drop">
                    <?php 
                    for($i=0;$i<count($Data);$i++) {
                    echo "<option value=".$Data[$i]['id'].">" . $Data[$i]['Name']."</option>";
                    }
                    ?>
                    </select>
                    <br> <br>
                <!-- Edit Product -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="EditProduct" value="Submit">
								Edit Product
							</button>
						</div>
					</div><br>
                </form>
			</div>
		</div>
	</div>
    </body>
</html>