<?php


$group=$_REQUEST["group"];
	include 'admin/connection.php';			
	$sql="SELECT number FROM groupno WHERE `group`=".$group;
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	echo $row["number"];
?>