<?php
if(!isset($_SESSION['user']))
{
	header("Location:index.php");
}
$subname= array();
$subsem= array();
$shortd= array();
$longd= array();
$status= array();
$subid=array();
include 'admin/connection.php';

$sql = "SELECT * FROM subject where sem= '".$_SESSION["sem"]."'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {
     
			
		array_push($subid,$row["subid"]);
		array_push($subname,$row["name"]);
		array_push($subsem,$row["sem"]);
		array_push($shortd,$row["shortd"]);
		array_push($longd,$row["longd"]);
		array_push($status,$row["status"]);
		
    }
} else {
    echo "0 results";
}

mysqli_close($con);

?>