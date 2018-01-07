
<?php

if(!isset($_SESSION['user']))
{
	//header("Location:index.php");
}
print_r($_GET["checkbox"]);
session_start();
include 'admin/connection.php';

				

$subidget=$_GET["checkbox"];


			foreach($subidget as $value)
			{
				foreach($value as $subid)
				{
					//echo "me";
					$sqlgroup="SELECT subid FROM subchoice WHERE `group`=(SELECT `group` FROM subchoice WHERE subid=$subid)";
					$resultgroup=mysqli_query($con, $sqlgroup);
					
					if(mysqli_num_rows($resultgroup) > 0)																	//to print group members
					{
						while($rowgroup = mysqli_fetch_assoc($resultgroup))
						{	
	

		
						
					$sqldelete="DELETE FROM choice WHERE `subid`=\"".$rowgroup["subid"]."\" AND `id`=\"".$_SESSION["user"]."\"";					
					if(mysqli_query($con, $sqldelete))
					{
						//echo "delete";
					}else
					{
						echo "problem";
					}
					}
					}
						
					
					
					
					$sql="INSERT INTO choice(`id`,`subid`) VALUES ('".$_SESSION["user"]."','".$subid."')";
					
			if(mysqli_query($con,$sql))
				{
					$sql3="UPDATE choice SET status=\"true\" WHERE id=\"".$_SESSION["user"]."\"";
					if(mysqli_query($con,$sql3))
					{
			
					header("Location:status.php");
					}
					else
					{
						header("Location:status.php");
					}
				}
				else
				{
					echo "error";
					mysqli_error($con);
				}
				}
			}
			
			mysqli_close($con);	
?>
