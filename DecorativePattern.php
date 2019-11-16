<?php 
include_once 'ConnectionClass.php';

interface Shipping {  // Shipping Interface Class.
    
    public function GetPrice($Product);

    public function GetDescription($Product);
}


abstract class ShippingDecorator implements Shipping { // Shipping Decorator Class

    protected $Shipping;
    
    public $Cost;
    public $Description;

    public function __construct(Shipping $Shipping)
    {
        $this->Shipping = $Shipping;
    }
    
  abstract function GetPrice($Product);
  
  abstract function GetDescription($Product);
}

class ProductProperties implements Shipping {
    
    public function GetPrice($Product) {
        
    $DB = new Database();

    $DB = Database::GetInstance();
        
    $Cost = "";
    
    $Query = "SELECT Price FROM products WHERE id = '$Product' ";
            
    $Result = mysqli_query($DB->GetConnection(),$Query);
        
    while($row = mysqli_fetch_array($Result)) {
          $Cost = $row["Price"];
    } 
        return $Cost;
}
    
    public function GetDescription($Product) {
        
    $DB = new Database();
        
    $DB = Database::GetInstance();
        
    $Query = "SELECT Description FROM products WHERE id = '$Product' ";
    
    $Result = mysqli_query($DB->GetConnection(),$Query);
        
    while($row = mysqli_fetch_array($Result)) {
          $Description = $row["Description"];
    }
        return $Description;
    }  
}

class Taxes extends ShippingDecorator {
    
    public function GetPrice($Product) {
        
        $Taxes = 300;
    
        return $this->Shipping->GetPrice($Product) + $Taxes;
}
    
    public function GetDescription($Product) {        
        
        return $this->Shipping->GetDescription($Product) . " " . " with Taxes Wrapper";
    } 
}

class Discount extends ShippingDecorator {

    public function GetPrice($Product) {
    
    $Discount = 150;
        
    return $this->Shipping->GetPrice($Product) - $Discount;
}
    
    public function GetDescription($Product) {
        return $this->Shipping->GetDescription($Product) . " " ." with Discount Wrapper";
    }  
}

class ShippingClass extends ShippingDecorator {
    
    public function GetPrice($Product) {
    
    $Ship = 120;
        
  return $this->Shipping->GetPrice($Product) + $Ship;
}
    
    public function GetDescription($Product) {
        return $this->Shipping->GetDescription($Product) . " " . " with Shipping Wrapper";
    }   
}
?>