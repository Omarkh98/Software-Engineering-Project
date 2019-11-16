<?php 
include 'WareHouse.php';
$WH = warehouse::DisplayAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>WareHouse Management </title>
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
				<form class="login100-form validate-form" method="post"action="EditWareHouseName.php">
					<span class="login100-form-title p-b-49">
						WareHouse Management 
					</span>
                    <h4 style="font-family:Arial Black;">Please Select The WareHouse You Would Like To Edit</h4><br>
                    <select name="Drop">
                    <?php
                    for($i=0;$i<count($WH);$i++){
                    echo "<option value=".$WH[$i]->id.">" . $WH[$i]->WHname."</option>";
                    }
                    ?>
                    </select>
                    <br><br>
                    
                <!-- Edit WareHouse Name -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="EditName" value="Submit">
								Edit WareHouse Name
							</button>
						</div>
					</div><br>
                </form>
                <form class="login100-form validate-form" method="post"action="EditWareHouseLocation.php">
                <!-- Edit WareHouse Location -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="EditLocation" value="Submit">
								Edit WareHouse Location
							</button>
						</div>
					</div><br>
				</form>
			</div>
		</div>
	</div>
    </body>
</html>