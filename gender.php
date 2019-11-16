<?php
include_once 'ConnectionClass.php';
$DB = new Database();

class gender{
	public $Gender;
	public $id;
    
static function getID($id){
$DB = Database::GetInstance();
    
	if($id != NULL){
        $Query = "SELECT * FROM gender WHERE id = '$id'";
        $Result = mysqli_query($DB->GetConnection(),$Query);
        while($row=mysqli_fetch_array($Result )){
            $gender = new gender;
            $gender = $row;
			return $gender;
        }
    }
}


}


?>