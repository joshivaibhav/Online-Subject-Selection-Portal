<?php
if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}
$subid=$_POST["subid"];
$group=$_POST["group"];
$sem=$_POST["sem"];





				include 'connection.php';
				
				$sql="INSERT INTO subchoice (`sem`,`subid`,`group`) VALUES ('".$sem."','".$subid."','".$group."')";
				if(mysqli_query($con,$sql))
				{
					$_SESSION["seesem"]=$sem;
					header("Location:newchoice.php");
				
				}
				else
				{
					echo "morghulis";
					mysqli_error($con);
				}
				mysqli_close($con);

?>

<html><body><br><br><a href="index.php">admin</a></body></html>