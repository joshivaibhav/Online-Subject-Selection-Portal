<?php
session_start();
if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}
if(isset($_POST["sem"]))
{
$sem=$_POST["sem"];
$_SESSION["seesem"]=$sem;
}
else{
	if(isset($_SESSION["seesem"]))
	{
		$sem=$_SESSION["seesem"];
	}
	else{
		header("Location:index.php");
	}
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Select Choice</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="../css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="../css/main.css">
		
		<link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/icomoon-social.css">
        
		
		<script>
	

function ajax(str)
{
	
	
	
	var number=document.getElementById("number").value;
	if(number==0)
	{
		alert("cannot select 0");
		document.getElementById("number").value=1;
	}
	else{
	var group=str;
	
	
	
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
				
			alert("number submitted successfully");
			
			
		}
	}
		
	xmlhttp.open("GET", "selectsubmit.php?group="+group+"&number="+number, false);
	xmlhttp.send();
	
	
	

	
	
	}
}

function see()
{
	
	$(document).ready(function(){
		$("#hider").slideUp("slow");
        $("#newgroup").slideDown("slow");
    });



	
}
</script>

		
        <script src="../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    
	<style>
	.outsider{
		background: none repeat scroll 0 0 #ffffff;  border: solid 2px #000; padding:0px;
		margin:4px;
	}
	.insider{
		font-size:1.25em;
		font-weight:550;
		color:black; border: solid 2px rgb(172, 179, 183); margin:2px; padding:10px;
		padding-top:0px;
		padding-bottom:0px;
	}
	.selecter
	{
		border:0px;
	}
	.mybtn:hover{
		color:white;
	}
	td{
		width:10em;
	}
	
	</style>
	
	</head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
		
		
		
		
     
        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
						<div class="col-sm-4"></div>
					<div class="col-sm-4" align="center">
						<h1>Optional Subjects</h1>
						
					</div>
					<div class="col-sm-4" align="right"><div class="actions"><a href="index.php" class="btn mine" style="font-size:1.25em; font-weight:500;">Home</a></div></div>
				</div>
			</div>
		</div>
        
		
				
						
						
						
<?php
$count=0;
include 'connection.php';

$sql = "SELECT * FROM subchoice WHERE sem=\"".$sem."\" ORDER BY `group` ASC";
$result = mysqli_query($con, $sql);



$trackcount=0; // to count how many iteration are there.
$show=array(); // to decide whether want to print select and form or not.
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result)) {
	
	
	
	if($trackcount==0){}
	else if($last==$row2["group"])
	{
		array_push($show,0);

		
	}
	else{
		array_push($show,1);
	}
	
	
	
	$last=$row2["group"];
	$trackcount++;
	}
	array_push($show,1);
	
}

mysqli_data_seek($result,0);

$top=0;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

	
if($show[$top]==0)
{
	$sqlname="SELECT name FROM subject WHERE subid=\"".$row["subid"]."\"";
		$resultname = mysqli_query($con, $sqlname);
	 $name=mysqli_fetch_assoc($resultname);
	 
	 
	if($top==0||$show[$top-1]==1 ){
	echo "<div class=\"row\"><div class=\"col-md-4\"></div><div class=\"col-md-4 outsider\" >";
	}
	echo "
		<div class=\"insider\" ><table class=\"table\"><tr><td>".$name["name"]."</td><td><form action=\"delete_subject_choice.php\" method=\"post\"><input type=\"hidden\" name=\"sem\" value=\"$sem\"><input type=\"hidden\" name=\"subid\" value=\"".$row["subid"]."\"><input class=\"btn mybtn\" type=\"submit\" value=\"delete\"></form></td></tr></table></div>
		";
		$top++;
		continue;
	
}
	
	
	$sqlnumber="SELECT * FROM groupno WHERE `group`='".$row["group"]."'";
	$resultnumber = mysqli_query($con, $sqlnumber);
	$rownumber=mysqli_fetch_assoc($resultnumber);
	$number=$rownumber["number"];


$sqltotal="SELECT COUNT(subid) FROM subchoice WHERE `group`='".$row["group"]."'";
$resulttotal=mysqli_query($con, $sqltotal);
$rowtotal=mysqli_fetch_assoc($resulttotal);
$total=$rowtotal["COUNT(subid)"];


$select="";
$select.="
<div class=\"insider selecter\" >
<table class=\"table\"><tr><td>

<form>
<select name=\"number\" id=\"number\" onchange=\"ajax(".$row["group"].");\">
";

for($i=0;$i<=$total;$i++)
{
	if($number==$i)
	{
		$select.="<option value=\"".$i."\" selected>".$i."</option>";	
	}
	else
	{
		$select.="<option value=\"".$i."\">".$i."</option>";
	}
}

$select.="
</select>
</form>
";


$sqlname="SELECT name FROM subject WHERE subid=\"".$row["subid"]."\"";
	 $resultname = mysqli_query($con, $sqlname);
	 $name=mysqli_fetch_assoc($resultname);	
	
	if($top==0 || $show[$top-1]==1 ){
	echo "<div class=\"row\"><div class=\"col-md-4\"></div><div class=\"col-md-4 outsider\" >";
	}
	echo "
		<div class=\"insider\" ><table class=\"table\"><tr><td>".$name["name"]."</td><td><form action=\"delete_subject_choice.php\" method=\"post\"><input type=\"hidden\" name=\"sem\" value=\"$sem\"><input type=\"hidden\" name=\"subid\" value=\"".$row["subid"]."\"><input type=\"submit\" class=\"btn mybtn\" value=\"delete\"></form></td></tr></table></div>
		";
	
	echo $select."
		
		</td><td><form action=\"add_subject_choice.php\" method=\"post\"><input type=\"hidden\" name=\"sem\" value=\"$sem\"><input type=\"hidden\" name=\"group\" value=\"".$row["group"]."\"><input type=\"submit\" class=\"btn mybtn\" value=\"new Subject\"></form></td></tr></table></div>";
		
	echo "</div></div>";
	$track=$row["group"];
	$count++;
	$top++;
}

}else {
    
}

mysqli_close($con);
?>
					<div class="row" >
					<div class="col-md-4"></div>
					<div class="col-md-4 outsider" >
						
						
						<div class="insider" id="hider" style="padding:10px;" align="center">
							<button onclick="see();" class="btn mybtn">new Group</button>
							
						</div>
						<div class="insider" id="newgroup" style="display:none; padding:10px;">
							<form action="add_subject_choice.php" method="post"><input type="hidden" name="sem" value="<?php echo $sem;?>"><input type="hidden" name="group" value="new"><input type="submit" class="btn mybtn" value="new Subject"></form>
						</div>
					</div>
					</div>
						
						
						
		
		
		
        <!-- Javascripts -->
		<script><?php if(isset($_POST["msg"])){ echo "alert(\"".$_POST["msg"]."\");";}?>	</script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.sequence-min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/main-menu.js"></script>
        <script src="js/template.js"></script>

    </body>
</html>