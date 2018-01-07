<?php

session_start();

if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}




$name=$_POST["name"];

$sem=$_POST["sem"];
$status=$_POST["status"];
$longd=$_POST["longd"];
$shortd=$_POST["shortd"];
$subid=$_POST["subid"];


				include 'connection.php';
				
				$sql="UPDATE subject SET name='$name',sem='$sem',longd='$longd',shortd='$shortd',status='$status' WHERE subid=$subid";
				if(mysqli_query($con,$sql))
				{
					header("Location:see.php?msg=updated subject info");
				}
				else
				{
					echo "error";
					mysqli_error($con);
				}
				mysqli_close($con);

				


?>
<html>
<body>
<a href="index.php">Admin</a>
</body>
</html>
