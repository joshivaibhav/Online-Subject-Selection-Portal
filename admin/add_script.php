<?php
session_start();

if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}
include 'connection.php';

?>


<?php

$name=$_POST["name"];
$sem=$_POST["sem"];
$sem=intval($sem);
$shortd=$_POST["shortd"];
$longd=$_POST["longd"];
$status=$_POST["status"];


				
				
				$sql="INSERT INTO subject (name,sem,shortd,longd,status) VALUES ('".$name."','".$sem."','".$shortd."','".$longd."','".$status."')";
				if(mysqli_query($con,$sql))
				{
					echo "done";
				}
				else
				{
					mysqli_error($con);
				}
				mysqli_close($con);




?>

<html>
<body>
<a href="index.php">Admin</a>
</body>
</html>
