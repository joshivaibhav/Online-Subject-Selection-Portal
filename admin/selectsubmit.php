<?php
session_start();
if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}
$group=$_REQUEST["group"];
$number=$_REQUEST["number"];

echo $group.$number;

				include 'connection.php';
				
				$checksql="SELECT * FROM groupno WHERE `group`=".$group;
				$checkresult=mysqli_query($con,$checksql);
				
				if (mysqli_num_rows($checkresult) > 0) {
				echo "1";
				$sql="UPDATE groupno SET `number`='".$number."' WHERE `group`=".$group;
				}
				else{
				
				echo "2";
				
				$sql="INSERT INTO groupno (`group`,number) VALUES ('".$group."','".$number."')";
				
				}
				if(mysqli_query($con,$sql))
				{
					echo "done";
				}
				else
				{
					echo "error";
					mysqli_error($con);
				}
				mysqli_close($con);



?>