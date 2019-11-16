<?php 
include_once 'ConnectionClass.php';
$DB = new Database();

class user {
public $id;
public $Fname;
public $Name;
public $password;
public $email;
public $HashedPassword;
public $UserType;
public $Lname;
public $GenderID;
public $Connection;
public $p;
public $Type;
public $DropDown;
    
static function GetUserInfo($Drop) {
$DB = Database::GetInstance();
    
$Data = array();
    
$Query = "SELECT * FROM user WHERE id = '$Drop'";
$Result = mysqli_query($DB->GetConnection(),$Query);
    
while($row = mysqli_fetch_array($Result)) {
    $Data [] = $row;
}
return $Data; 
}
    
 function Construct($ID){ 
$DB = Database::GetInstance();

    if($ID != NULL){
        $Query = "SELECT * FROM user WHERE Id = '$ID'";
        $Result = mysqli_query($DB->GetConnection(),$Query);
        while($row=mysqli_fetch_array($Result )){
            $user = new user;
            $user = $row;
        }
    }
}


static function SignOut(){
  if(isset($_SESSION)){
  session_start();
  session_destroy();    
  }
  header("Location:");
}


static function Login($email,$p){
$DB = Database::GetInstance();
$HashedPassword = "";
$HashedPassword = sha1($p);
    
    
    $Query = "SELECT * FROM user WHERE email ='$email' AND password ='$HashedPassword' AND Is_Deleted = 0";
    $Result = mysqli_query($DB->GetConnection(),$Query);

   while($row = mysqli_fetch_array($Result))
    {
       session_start();
       $Id = $row["id"];
       $_SESSION["ID"] = $Id;
       return true;      
    }
}
    
static function CheckEmail($Email) {
    $DB = Database::GetInstance();
    
    $Query = "SELECT * FROM user WHERE email = '$Email' ";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    
    $rowcount = mysqli_num_rows($Result);
    
    return $rowcount;  
}


static function SignUp($Object,$GenderID){
$DB = Database::GetInstance();
include 'gender.php';

    $gender = new gender();
    $FC_ID = intval($gender->getID($GenderID));  // Problem With Gender.
    $UserType=1;
    $Object->password = sha1($Object->password);
    $Query = "INSERT INTO user(Fname,Lname,email,password,gender,UserType)
    VALUES('".$Object->Fname."','".$Object->Lname."','".$Object->email."','".$Object->password."','$FC_ID','$UserType')";
    $Result = mysqli_query($DB->GetConnection(),$Query);
      if($Result){
      $Query2 = "SELECT * FROM user WHERE password = '$Object->password'";
      $Result2 = mysqli_query($DB->GetConnection(),$Query2);
         while($row=mysqli_fetch_array($Result2)){
         $Id = $row['id'];
         $HashedId= sha1($Id);
         $Query3 = "UPDATE user SET hashed_id = '$HashedId' WHERE id = '$Id' ";
         $Result3 = mysqli_query($DB->GetConnection(),$Query3);
  } 
 }
}
    
public static function DisplayAll() {
$DB = Database::GetInstance();
    
    $Query = "SELECT * FROM user WHERE IS_Deleted = 0";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    
    if(mysqli_num_rows($Result) > 0) {
        $Data = array();
        $i = 0;
        
        while($row=mysqli_fetch_array($Result)) {
        $Data [$i] = new user(0); 
        
        $Data[$i]->id = $row['id'];
        $Data[$i]->Fname = $row['Fname'];
        $Data[$i]->Lname = $row['Lname'];
        
        $i = $i + 1;
    }
    return $Data;
    }
    else {
        return NULL;
    }
}
    
public static function DisplayGender() {
$DB = Database::GetInstance();
    
    $Query = "SELECT * FROM gender";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    
    if(mysqli_num_rows($Result) > 0) {
        $Data = array();
        $i = 0;
        
        while($row=mysqli_fetch_array($Result)) {
        $Data [$i] = new user(0); 
        
        $Data[$i]->id = $row['id'];
        $Data[$i]->GenderID = $row['Gender'];
        
        $i = $i + 1;
    }
    return $Data;
    }
    else {
        return NULL;
    }
}
    
public static function DisplayUserType() {
$DB = Database::GetInstance();
    
    $Query = "SELECT * FROM user_type";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    
    if(mysqli_num_rows($Result) > 0) {
        $Data = array();
        $i = 0;
        
        while($row=mysqli_fetch_array($Result)) {
        $Data [$i] = new user(0); 
        
        $Data[$i]->id = $row['id'];
        $Data[$i]->Type = $row['Type'];
            
        $i = $i + 1;
    }
    return $Data;
    }
    else {
        return NULL;
    }
}
    
static function DeleteUser($ID){
$DB = Database::GetInstance();
      
    $IsDeleted = 1;
        
    $Query2 = "Update user set Is_Deleted ='$IsDeleted' WHERE id = '$ID' ";
    $Result2 = mysqli_query($DB->GetConnection(),$Query2);
    echo $Query2;
    
    if($Result2){
       echo "Deleted";
       return true;
    }

mysqli_close($Connection);
}


static function EditUser($Object,$ID){
$DB = Database::GetInstance();

$Query = "UPDATE user SET Fname='".$Object->Fname."',Lname='".$Object->Lname."',email='".$Object->email."',UserType='".$Object->UserType."' WHERE ID= '$ID' ";
    
$Result = mysqli_query($DB->GetConnection(),$Query);
    if($Result){
        return true;
    }
    else {
        return false;
    }
    }
}
?>