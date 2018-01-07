<?php
session_start();
if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}
include 'connection.php';
if(isset($_POST["sem"]) && isset($_POST["group"]))
{
$sem=$_POST["sem"];
$group=$_POST["group"];
}
else
{
	header("Location: newchoice.php");
}

if($group=="new")
{

$sqlgroup="SELECT `subchoice`.`group` FROM subchoice ORDER BY `subchoice`.`group` DESC LIMIT 1 ";
$resultgroup=mysqli_query($con, $sqlgroup);
$newgrouprow=mysqli_fetch_assoc($resultgroup);
$newgroup=$newgrouprow["group"];
$newgroup++;
}



$sql = "SELECT subid,name FROM subject WHERE sem=\"".$sem."\" AND status=false";
$result = mysqli_query($con, $sql);

$sql2="SELECT subid FROM subchoice WHERE sem=\"".$sem."\"";
$taken=mysqli_query($con, $sql2);

$except=array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_assoc($taken)) {
		array_push($except,$row2["subid"]);
		
	}
}

$showid=array();
$showname=array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
		if(!(in_array($row["subid"],$except)))
		{
		array_push($showid,$row["subid"]);
		array_push($showname,$row["name"]);
		}
	}
}




if(sizeof($showid)>0)
{

?>


<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Make Group of Subject</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<script src="../js/jquery-1.12.2.min.js"></script>
		<script src="../js/jquery-1.12.2.js"></script>
        
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="../css/main.css">

 
   

	 <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
 


<body>

<div class="section section-breadcrumbs" ">
	<div class="container">
		<div class="row">
			<div class="col-sm-4" align="center">
						<h1>Admin</h1>	
					</div>
					<div class="col-sm-4" align="right"><div class="actions"><a href="index.php" class="btn mine" style="font-size:1.25em; font-weight:500;">Home</a>
					</div>
					</div>

		</div>
	</div>
</div>


<div class="" ">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>	
			<div class="col-md-4" style="text-align :center;">
				


<form action="choicesubmit.php" method="post">
<select class="form-control" name="subid" >


<?php
$counter1=0;

for(;$counter1<sizeof($showid);$counter1++){
 echo "<option value=\"$showid[$counter1]\">$showname[$counter1]</option>";
}
 ?>
</select> 
<input type="hidden" name="sem" value="<?php echo $sem;?>">
<input type="hidden" name="group" value="<?php if($group=="new"){echo $newgroup;}else{echo $group;} ?>">
<input type="submit" class="btn" value="submit" style="margin-top:5px;"> 
</form>
			</div>
		</div>
	</div>
</div>

<?php
}
else
{?>
	<!DOCTYPE html><html>
	<head>
	<script src="../js/jquery-1.12.2.min.js"></script>
		<script src="../js/jquery-1.12.2.js"></script>
        <link rel="stylesheet" href="../css/main.css">
	</head>
	<body onload="">
	<form action="newchoice.php" id="myform" method="post"><input type="hidden" name="msg" value="There are no Optional Subject left."></form>
	<script>
		
				$(document).ready(function(){
				$("#myform").submit();
				});
	</script>
	
	<?php
	}
?>
</body>
</html>
	