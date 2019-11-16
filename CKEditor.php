<!DOCTYPE html>
<html> 
<head><title> CK EDITOR TEST </title> 
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <script src="https://cdn.ckeditor.com/4.11.3/standard-all/ckeditor.js"></script>
</head>
<body> 
<h1> WELCOME PAGE </h1>
<br><br>
<?php 
if(!isset($_SESSION)){
Session_Start();}

include 'Connection1.php';

$Query = "SELECT * FROM CkEditor";
$Result = mysqli_query($Connection, $Query);
while($row=mysqli_fetch_array($Result)){
echo "<form method='post' action='EditPage.php'>";
echo '<a href="EditPage.php?id='.$row['id'].'">"'.$row['PageName'].'"</a>';
echo "</form>";
}
?>
</body>
</html>

