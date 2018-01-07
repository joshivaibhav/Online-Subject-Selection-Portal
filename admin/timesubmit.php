<?php
session_start();
if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}
$start=$_POST["stdate"];
$end=$_POST["enddate"];

$startdate=date_create_from_format("m/d/Y",$start);
$enddate=date_create_from_format("m/d/Y",$end);

$diff=date_diff($startdate,$enddate);

if($diff->format("%R")=="-"){
					header("Location:timeselect.php?msg=Select appropriate time");
}
else{
include 'connection.php';
				
				$sql="UPDATE time SET start=\"".$start."\", end=\"".$end."\"";
				if(mysqli_query($con,$sql))
				{
					// echo $diff->format("%R");
					header("Location:index.php?msg=time submitted.");
				}
				else
				{	
					echo "error";
					mysqli_error($con);
				}
				mysqli_close($con);
}
?>