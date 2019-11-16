<?php 
include 'WareHouse.php';
include 'StrategyDesignPattern.php';
include_once 'ConnectionClass.php';

$DB = new Database();
$S = new ST();
$W = new warehouse();

if(isset($_POST["Add"])) {
    
$W->Name = $_POST["Name"];
     
$W->A = $_POST["City"];
    
ValidateData($W->Name);
    
$W::AddWareHouse($W);
header("Location:WH.php");
}

if(isset($_POST["Delete"])) {
$W->WH = $_POST["Drop"];

$W::DeleteWareHouse($W->WH);
header("Location:WH.php");
}

if(isset($_POST["Edit"])) {
header("Location:MainEditWareHouse.php");
}

if(isset($_POST["UpadateName"])) {
$W->NewName = $_POST['Name'];
$W->id = $_POST['id'];

$W::EditName($W->NewName,$W->id);
header("Location:WH.php");
}

if(isset($_POST["UpdateLocation"])) {
$W->NewAddress = $_POST['City'];
$W->id = $_POST['Drop'];

$W::EditLocation($W->NewAddress,$W->id);
header("Location:WH.php");
}

if(isset($_POST["AddProduct"])) {  // Add Products.
    
$W->ProductName = $_POST["Name"];

$W->ProductType = $_POST["Type"];

$W->ProductWarehouse = $_POST["Drop"];

$W->ProductQuantity = $_POST["Quantity"];
    
ValidateData($W->ProductName);
ValidateData($W->ProductType);
ValidateData($W->ProductWarehouse);
ValidateData($W->ProductQuantity);

$W::AddProduct($W);
    
header("Location:AdminControlPanel.php");
}

if(isset($_POST["Chart"])) { // Show Pie-Chart Statistics of Products.
$S::PChart();
}
if(isset($_POST["Graph"])) { // Show Graph Statistics of Products.
$S::PGraph();
}

if(isset($_POST["ModifyProduct"])) {
    
$W->ProductName = $_POST["Name"];
    
$W->ProductQuantity = $_POST["Quantity"];
    
$W->$PID =  $_POST["id"];
    
$W::EditProduct($W->ProductName,$W->ProductQuantity,$W->$PID);

header("Location:AdminControlPanel.php");
}

function ValidateData($data) {
    
        $DB = Database::GetInstance();
        $data = strip_tags(mysqli_real_escape_string($DB->GetConnection(), trim($data)));
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
    return $data;
}
?>