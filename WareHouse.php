<?php
include_once 'ConnectionClass.php';
$DB = new Database();

class warehouse {

public $id;
public $Name;
public $A;
public $WH;
public $NewName;
public $NewAddress;
public $WHname;
public $DropDown;
public $PID;
public $PNAME;
public $ProductName;
public $ProductType;
public $ProductWarehouse;
public $ProductQuantity;
    
static function GetWareHouseInfo($Drop) {
$DB = Database::GetInstance();
    
$Data = array();
    
$Query = "SELECT * FROM warehouse WHERE id = '$Drop'";
$Result = mysqli_query($DB->GetConnection(),$Query);
    
while($row = mysqli_fetch_array($Result)) {
    $Data [] = $row;
}
return $Data; 
}
    
static function GetProductType() {
    $DB = Database::GetInstance();
    
    $Query = "SELECT * FROM product_type";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    
    if(mysqli_num_rows($Result) > 0) {
        $Data = array();
        $i = 0;
        
        while($row=mysqli_fetch_array($Result)) {
        $Data [$i] = new warehouse(0); 
        
        $Data[$i]->PID = $row['id'];
        $Data[$i]->PNAME = $row['Name'];
            
        $i = $i + 1;
    }
    return $Data;
    }
    else {
        return NULL;
    }
}


static function AddProduct($Object) {
$DB = Database::GetInstance();
    
$Query = "INSERT INTO products(Name,Type_id,Warehouse_id,Quantity) VALUES ('".$Object->ProductName."','".$Object->ProductType."','".$Object->ProductWarehouse."','".$Object->ProductQuantity."')";
$Result = mysqli_query($DB->GetConnection(),$Query); 

if($Result){
	$Query2 = "SELECT * FROM products WHERE Name = '$Object->ProductName'";
	$Result2 = mysqli_query($DB->GetConnection(),$Query2);
	while($row=mysqli_fetch_array($Result2)){
		$Id = $row['id'];
		$HashedId= sha1($Id);
		$Query3 = "UPDATE products SET hashed_id = '$HashedId' WHERE id = '$Id' ";
		$Result3 = mysqli_query($DB->GetConnection(),$Query3);
        echo "<br>";
	}
	if($Result3){
        return true;
		}
    }
}


static function AddWareHouse($Object) {
$DB = Database::GetInstance();
    
$Query = "INSERT INTO warehouse(name,Address) VALUES ('".$Object->Name."','".$Object->A."')";
$Result = mysqli_query($DB->GetConnection(),$Query); 

if($Result){
	$Query2 = "SELECT * FROM warehouse WHERE name = '$Object->Name'";
	$Result2 = mysqli_query($DB->GetConnection(),$Query2);
	while($row=mysqli_fetch_array($Result2)){
		$Id = $row['id'];
		$HashedId= sha1($Id);
		$Query3 = "UPDATE warehouse SET hashed_id = '$HashedId' WHERE id = '$Id' ";
		$Result3 = mysqli_query($DB->GetConnection(),$Query3);
        echo "<br>";
	}
	if($Result3){
        return true;
		}
    }
}

static function DeleteWareHouse($DropDown) {
$DB = Database::GetInstance();

    $IsDeleted = 1;

    $Query2 = "UPDATE warehouse SET Is_Deleted ='$IsDeleted' WHERE id = '$DropDown'"; 
    $Result2 = mysqli_query($DB->GetConnection(),$Query2);
    if($Result2){
        return true;
    }
    else {
        return false;
    }
}
    
static function DisplayAll() {
$DB = Database::GetInstance();
    
    $Query = "SELECT * FROM warehouse WHERE IS_Deleted = 0";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    
    if(mysqli_num_rows($Result) > 0) {
        $Data = array();
        $i = 0;
        
        while($row=mysqli_fetch_array($Result)) {
        $Data [$i] = new warehouse(0); 
        
        $Data[$i]->id = $row['id'];
        $Data[$i]->WHname = $row['name'];
            
        $i = $i + 1;
    }
    return $Data;
    }
    else {
        return NULL;
    }
}
    
static function DisplayAddresses() {
$DB = Database::GetInstance();
    
    $Query = "SELECT * FROM addresses WHERE Parent_ID = 0";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    
    if(mysqli_num_rows($Result) > 0) {
        $Data = array();
        $i = 0;
        
        while($row=mysqli_fetch_array($Result)) {
        $Data [$i] = new warehouse(0); 
        
        $Data[$i]->id = $row['id'];
        $Data[$i]->A = $row['Name'];
            
        $i = $i + 1;
    }
    return $Data;
    }
    else {
        return NULL;
    }
}
    
static function GetProducts($Drop) {
$DB = Database::GetInstance();
    
$Data = array();
    
$Query = "SELECT * FROM products WHERE Warehouse_id = '$Drop'";
$Result = mysqli_query($DB->GetConnection(),$Query);
    
while($row = mysqli_fetch_array($Result)) {
    $Data [] = $row;
}
return $Data; 
}
    
static function NewGetProducts() {
$DB = Database::GetInstance();
    
$Data = array();
    
$Query = "SELECT * FROM products";
$Result = mysqli_query($DB->GetConnection(),$Query);
    
while($row = mysqli_fetch_array($Result)) {
    $Data [] = $row;
}
return $Data; 
}

static function GetProductInfo($Drop) {
$DB = Database::GetInstance();
    
$Data = array();
    
$Query = "SELECT * FROM products WHERE id = '$Drop'";
$Result = mysqli_query($DB->GetConnection(),$Query);
    
while($row = mysqli_fetch_array($Result)) {
    $Data [] = $row;
}
return $Data;  
}
    
static function EditName($Name,$Id) {
$DB = Database::GetInstance();
    
    $Id2 = "";
    
    $Query = "SELECT * FROM warehouse WHERE id = '$Id' ";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    while($row = mysqli_fetch_array($Result)){
        $Id2 = $row['id'];
    }
    $Query2 = "UPDATE warehouse SET name = '$Name' WHERE id = '$Id2' ";
    $Result2 = mysqli_query($DB->GetConnection(),$Query2);
    if($Result2){
        return true;
    }
    else {
        return false;
    }  
}
    
static function EditProduct($Name,$Quantity,$Id) {
    $DB = Database::GetInstance();
    
    $Query = "UPDATE products SET Name = '$Name', Quantity = '$Quantity' WHERE id = '$Id' ";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    if($Result){
        return true;
        }
    else{
        return false;
    }
}

static function EditLocation($Location,$Id) {
$DB = Database::GetInstance();
    
    $Query = "UPDATE warehouse SET Address = '$Location' WHERE id = '$Id' ";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    if($Result){
        return true;
        }
        else{
        return false;
        }
}
}
?>