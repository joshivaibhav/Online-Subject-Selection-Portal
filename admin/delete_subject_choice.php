<?php
session_start();
if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}
$subid=$_POST["subid"];
$sem=$_POST["sem"];

		include 'connection.php';
				
				$sqlgroup="SELECT `group` FROM subchoice WHERE subid=\"".$subid."\" AND sem=\"".$sem."\"";
				$resultgroup=mysqli_query($con,$sqlgroup);
				$rowgroup = mysqli_fetch_assoc($resultgroup);
				$group=$rowgroup["group"];
				
				
				$sql="DELETE FROM subchoice WHERE subid=\"".$subid."\" AND sem=\"".$sem."\"";
				if(mysqli_query($con,$sql))
				{
					
					$sqltotal="SELECT COUNT(subid) FROM subchoice WHERE `group`='".$group."'";
					$resulttotal=mysqli_query($con, $sqltotal);
					$rowtotal=mysqli_fetch_assoc($resulttotal);
					$total=$rowtotal["COUNT(subid)"];
					
					if($total==0){
						
						$sqldelete="DELETE FROM groupno WHERE `group`=".$group;
						if(mysqli_query($con,$sqldelete))
						{
							echo "deleted";
						}
						else
						{
							mysqli_error($con);
						}
					}
					
					
					
					
					$_SESSION["seesem"]=$sem;
					header("Location:newchoice.php");
				
				
				
				
				}
				else
				{
					mysqli_error($con);
				}
				mysqli_close($con);
?>
<html><body><br><br><a href="index.php">admin</a></body></html>