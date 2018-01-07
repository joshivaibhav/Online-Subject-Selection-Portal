<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("Location:index.php");
}
?>


<?php

include 'admin/connection.php';
include 'admin/timechecker.php';
$sql = "SELECT * FROM choice WHERE id=\"".$_SESSION["user"]."\"";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) 
{


?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Status Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="css/main.css">

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Your selected subjects</h1>
					</div>
				</div>
			</div>
		</div>
		
		<?php	
		while($row = mysqli_fetch_assoc($result))															//choiced by user
{
	
	?>
	
	<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="basic-login" style="font-weight:600; font-size:2em;">
		
		<?php

$sqlchoice="SELECT * FROM subchoice WHERE subid=\"".$row["subid"]."\"";
$resultchoice=mysqli_query($con, $sqlchoice);
$rowchoice=mysqli_fetch_assoc($resultchoice);

$sqlsub="SELECT * FROM subchoice WHERE `group`=".$rowchoice["group"];
$resultsub=mysqli_query($con, $sqlsub);

if(mysqli_num_rows($resultsub) > 0)																	//to print group members
{
	$count_group_name=1;
	echo "Out of";
	
	while($rowgroup_sub = mysqli_fetch_assoc($resultsub))
	{
		$sqlname_group="SELECT name FROM subject WHERE subid=\"".$rowgroup_sub["subid"]."\"";            //to take names of all group subject
		$result_group=mysqli_query($con, $sqlname_group);
		$row_group=mysqli_fetch_assoc($result_group);
		
		echo " ".$row_group["name"];
		
		if(!($count_group_name==mysqli_num_rows($resultsub)))
		{
			echo " , ";
		}
	
		$count_group_name++;
}
	
	echo "<br>";
}																							//group name printing ends here.


$sqlname_selected="SELECT name FROM subject WHERE subid=\"".$row["subid"]."\"";                    // to take name of selected one.

$resultname_selected = mysqli_query($con, $sqlname_selected);

$name=mysqli_fetch_assoc($resultname_selected);											//sub name====  $name

?>
<hr style="
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;">
  <div id="choice_display" style="padding-bottom:3px;">Your Choice is 	: <?php echo $name["name"]; ?>
  </div>
</div>
</div>
</div>
</div>

<br><br><br>


<?php


		
}
?>

<div class="container" align="center" style="padding-top:10px;">
				<div class="row">
					<div class="col-md-12">
						<div align="center" class="basic-login" style="font-weight:600; font-size:2em;height:135px;width:320px;">
Do you want to edit?<br><br>
<a class="btn" href="newchoice.php" style="font-size:0.75em;">Edit Your Choice</a>
						</div>
					</div>
			</div>
</div>

</body>
</html>




<?php


}
else
{
	header("Location: newchoice.php");
}

?>