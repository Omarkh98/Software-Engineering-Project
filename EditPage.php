<!DOCTYPE html>
<html> 
<head><title> Edit Page</title> 
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <script src="https://cdn.ckeditor.com/4.11.3/standard-all/ckeditor.js"></script>
</head>
<body> 
<?php 
require_once('CKEditor.php');
include 'Connection1.php';

$Id = $_GET['id'];
$Query = "SELECT * FROM CkEditor WHERE id = '$Id'";
$Result = mysqli_query($Connection, $Query);
while($row = mysqli_fetch_array($Result)){
$Id5 = $row['id'];
$Page = $row['HtmlText'];
$Name = $row['PageName'];}
?>
    
<form method="post" action="">
<textarea cols='80' id='editor1' name='editor1' rows='10'>
<?php 
echo $Page;
?>
</textarea>
<input type="submit" name="Save" value="Save">
 </form>
<?php
 if(isset($_POST['Save'])) {
 $Field = $_POST['editor1'];
 
 $Query = "UPDATE CkEditor SET HtmlText = '$Field' WHERE id = '$Id5' ";
 $Result = mysqli_query($Connection, $Query);
 if($Result) {
	 echo "Page Updated Successfuly";
 }
 }
 ?>
  <script>
    CKEDITOR.replace('editor1', {
      fullPage: true,
      extraPlugins: 'docprops',
      allowedContent: true,
      height: 320
    });
  </script>
</body>

