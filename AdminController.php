<?php 
if(isset($_POST["Foundations"])) {  // Re-direct to Foundations.
//header("Location:");
}

if(isset($_POST["WareHouses"])) {  // Re-direct to Warehouses.
header("Location:WarehouseManagement.php");
}

if(isset($_POST["Donations"])) {  // Re-direct to Donations.
//header("Location:");
}

if(isset($_POST["Add"])) {  // Re-direct to Add Products.
header("Location:AddProducts.php");
}

if(isset($_POST["Statistics"])) {  // Re-direct to Statistics Page.
header("Location:ProductStatistics.php");
}

if(isset($_POST["Edit"])) {  // Re-direct to Edit Warehouse.
header("Location:NewEditProducts.php");
}
if(isset($_POST["Manage"])) {
header("Location:WH.php");
}
?>