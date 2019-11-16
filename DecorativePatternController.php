<?php 
include_once 'DecorativePattern.php';

if(isset($_POST["Checkout"])) {
    $Product = $_POST["Product"]; 
    
    $Wrapper = new ProductProperties();
    echo " Product's Original Price : " . $Wrapper->GetPrice($Product);
    // le7ad hena tmam
    
    if(!empty($_POST["WH"])) {
        foreach ($_POST['WH'] as $select)
        {            
            if($select == "T") {
               $Wrapper = new Taxes($Wrapper);  
            }
            if($select == "D") {
                $Wrapper = new Discount($Wrapper);
            }
            if($select == "S") {
                $Wrapper = new ShippingClass($Wrapper);
            }
        }
    echo "<br><br>";
    echo " Product After Wrapper : " . $Wrapper->GetPrice($Product);
    echo "<br><br>";
    echo " Product Description : " . $Wrapper->GetDescription($Product);
    }
}
?>