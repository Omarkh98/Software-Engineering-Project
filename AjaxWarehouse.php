
<select name="City">

<?php 
include_once 'ConnectionClass.php';
$DB = new Database();
    
$City = "";

if(!empty($_POST["Id"])){

    $Id = $_POST["Id"];
    
    $Query = "SELECT * FROM addresses WHERE  Parent_ID = '$Id' ";
    
    $Result = mysqli_query($DB->GetConnection(),$Query);
    
    if($Result > 0){
        echo '<option value="City">Select Country</option>';
        while($row = mysqli_fetch_array($Result)){ 
            echo '<option name="City" value="'.$row['id'].'">'.$row['Name'].'</option>';
            $City = $row['id'];
        }
    } else {
        echo '<option value="">Country not available</option>';
    }  
}
?>
    </select>
