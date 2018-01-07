	<?php

session_start();

if(!isset($_SESSION["admin"]))
{
	  header("Location: login.php");	

}




$del=$_GET["subid"];
				include 'connection.php';
				
				$sql="DELETE FROM subject WHERE subid=\"".$del."\"";
				if(mysqli_query($con,$sql))
				{
					header("Location:see.php");
				}
				else
				{
					mysqli_error($con);
				}
				mysqli_close($con);




?>