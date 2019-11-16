<?php 
include 'WareHouse.php';
$WH = warehouse::DisplayAll();
$WHA = warehouse::DisplayAddresses();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
    <script type="text/javascript">
$(document).ready(function(){
    $('#Country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'AjaxWarehouse.php',
                data:'Id='+countryID,
                success:function(html){
                    $('#City').html(html);                  
                }
            }); 
           
        }else{
            $('#City').html('<option value="">Please Select The Country First</option>');
        }
    });
}); 
</script>
</head>
<body>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post"action="WareHouseController.php">
					<span class="login100-form-title p-b-49">
						WareHouse Management 
					</span>
                    <!-- Select WareHouse -->
                    <h4 style="font-family:Arial Black;">Please Select The WareHouse You Would Like to Change The Location for</h4><br>
                <div class="wrap-input100 validate-input m-b-23" data-validate = "WareHouse Location is reauired">
                    <select name="Drop">
                    <?php 
                    for($i=0;$i<count($WH);$i++){
                    echo "<option value=".$WH[$i]->id.">" . $WH[$i]->WHname."</option>";
                    } 
                    ?>
                    </select>
                </div><br><br>
                <!-- Select Country -->
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Country is required">
						<span class="label-input100">Select WareHouse Country</span>
                        <select style="margin-right: 10px; margin-left: 10px;" id="Country" name="Country">
                        <option value="">Select Country</option>
                        <?php
                       for($i=0;$i<count($WHA);$i++){
                       echo "<option value=".$WHA[$i]->id.">" . $WHA[$i]->A."</option>";
                        } 
                        ?> 
                        </select>  
					</div>
                    <br>
                    <!-- Select City -->
					<div class="wrap-input100 validate-input m-b-23" data-validate = "City is reauired">
						<span class="label-input100">Select WareHouse City</span><br><br>
                        <select id="City" name="City" style="margin-left: 5px;">
                        <option value="">Select Country First</option>
                        </select>
						<br><br> 
                    </div>
                    
                    <!-- Update WareHouse Location -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="UpdateLocation" value="Submit">
								 Update WareHouse Location 
							</button>
						</div>
					</div><br>
				</form>
			</div>
		</div>
	</div>
    </body>
</html>