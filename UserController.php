<?php 
include_once 'User.php';
include_once 'StrategyDesignPattern.php';
include_once 'ConnectionClass.php';

$DB = new Database();
$x = new user();
$S = new ST();


if(isset($_POST["SignUP"])) {
$x->Fname=$_POST["Fname"];
$x->Lname=$_POST["Lname"];
$x->email=$_POST["Email"];
$x->password=$_POST["Password"];
$SelectedCategory=$_POST["gender"];

ValidateData($x->Fname);
ValidateData($x->Lname);
ValidateData($x->email);
ValidateData($x->password);
        
$EmailValidated = $x::CheckEmail($x->email);
    
    if($EmailValidated > 0) {
        echo "<script> alert('Sorry, Email Alrady Exists, Try another One'); </script>";
        echo "<script> window.location = 'SignUpForm.php'; </script>";
    }
    else {
$x::SignUp($x,$SelectedCategory);
    }
}
    
if(isset($_POST["Login"])) {
$x->email=$_POST['Email'];
$x->password=$_POST['Password'];
    
ValidateData($x->email);
ValidateData($x->password); 
    
$x::Login($x->email,$x->password);
     
}

if(isset($_POST["DeleteUser"])){
$x->id = $_POST["Drop"];
$x::DeleteUser($x->id);
header("Location:UserManagement.php");
}

if(isset($_POST["UpdateUser"])) {  
$x->Fname = $_POST["fn"];
$x->Lname = $_POST["ln"];
$x->email = $_POST["e"];
$x->UserType = $_POST["Drop"];
$x->id = $_POST["id"];
    
ValidateData($x->Fname);
ValidateData($x->Lname);
ValidateData($x->email);

$x::EditUser($x,$x->id);
header("Location:UserManagement.php");
}

if(isset($_POST["Chart"])) {
$S::M();
}
if(isset($_POST["Graph"])) {
$S::F();
}

function ValidateData($data) {
    
        $DB = Database::GetInstance();
        $data = strip_tags(mysqli_real_escape_string($DB->GetConnection(), trim($data)));
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
    return $data;
}

?>
