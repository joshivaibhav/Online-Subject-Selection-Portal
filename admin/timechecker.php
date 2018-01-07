<?php
include 'connection.php';
				
				$sql = "SELECT * FROM time";
				$result = mysqli_query($con, $sql);
				
				$row = mysqli_fetch_assoc($result);
				
				$date1=date_create_from_format("m/d/Y",$row["start"]);
				$date2=date_create_from_format("m/d/Y",$row["end"]);
				
				date_default_timezone_set("Asia/Kolkata");
				
				$today=date_create_from_format("m/d/Y",date("m/d/Y"));
				$diff1=date_diff($date1,$today);
				$diff2=date_diff($date2,$today);
				
				if($diff1->format("%R")==="+" && $diff2->format("%R")==="-"){
					
				}else if($diff1->format("%R")==="-" && $diff2->format("%R")==="-"){
					header("Location:homepage.php");
				}
				else if($diff1->format("%R")==="+" && $diff2->format("%R")==="+")
				{
					header("Location:homepage.php");
				}
?>