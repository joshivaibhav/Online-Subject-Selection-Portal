<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("Location:index.php");
}
include 'admin/connection.php';
include 'admin/timechecker.php';


?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Choice Page</title>
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
 

		<script>
		
		var group = [];
		function grouptracker(count,grp)
		{
			group.push(grp);	
		}
		
function selecter(group,count)
{
	var counter=0;
	var max=0;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	var i=0;
	var j=0;
	//var checkbox[];
	//var temp;
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					
			
			var number=xmlhttp.responseText;
			//alert(number);
			var element=document.getElementsByName("checkbox["+count+"][]");
			
			for(i=0; i < element.length; i++){
				
			if(element[i].checked)
			{
				counter++;
			}
			}
			
			if(counter>=number)
			{
					for(j=0; j < element.length; j++){
				
						if(!element[j].checked)
						{
							element[j].disabled = true;
						}
					}	
			}
			else{
				for(j=0; j < element.length; j++){
				
						if(!element[j].checked)
						{
							element[j].disabled = false;
						}
					}
			}
				
				
			/*var xmlhttpnumber = new XMLHttpRequest();
			xmlhttpnumber.onreadystatechange = function() {
				
				if (xmlhttpnumber.readyState == 4 && xmlhttpnumber.status == 200) {
					
					
						max=xmlhttpnumber.responseText;
							
						for(i=0;i<max;i++)
						{
							//	temp=document.getElementById("checkbox["+count+"]["+i+"]").checked;
									
								//checkbox.push()temp;
								//alert(temp);
						}
						
						
	
						
				
	
	
	
	
				}
		}
		xmlhttpnumber.open("GET", "getgroupno.php?group="+group, true);
		xmlhttpnumber.send();

			
			*/
		
		}
	}
		xmlhttp.open("GET", "number.php?group="+group, true);
		xmlhttp.send();
}


function submitchecker(count)
{
	var xmlhttp = new XMLHttpRequest();
	var i=0;
	var j=0;
	var flag=true;
	var number=0;
	var element;
	var counter=0;
	for(i=0;i<=count;i++)
	{
		counter=0;
	
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
			number=xmlhttp.responseText;
			
			element=document.getElementsByName("checkbox["+i+"][]");
			
			
			for(j=0;j<element.length;j++)
			{
				if(element[j].checked)
				{
					counter++;
				}
			}
			
			if(counter!=number)
			{
				flag=false;
			}
			else{
				
			}
			
			
			//alert(i);
			//alert(group[i]);
			}
		}
		
		xmlhttp.open("GET", "number.php?group="+group[i], false);
		xmlhttp.send();
		
	}
	if(flag==true)
	{
	document.getElementById("myform").submit();
	}
	else{
		alert("please tick seriously");
	}
}


</script>


 </head>
<body>

	<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>New choice</h1>
					</div>
				</div>
			</div>
	</div>
		
        <div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="basic-login">
							<h3>Optional Subjects:</h3>
							
							<?php


$sql = "SELECT * FROM subchoice WHERE sem=\"".$_SESSION["sem"]."\" ORDER BY `group` ASC";
$result = mysqli_query($con, $sql);
$count=0;
$countgroup=0;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
	?>
	
	<form action="choicesubmit.php" id="myform">
	<table border="1" class="table" style="font-size:1.25em; font-weight:520;">
	<?php
	while($row = mysqli_fetch_assoc($result))
	{
	$sqlname="SELECT name FROM subject WHERE subid=\"".$row["subid"]."\"";
	$resultname = mysqli_query($con, $sqlname);
	$name=mysqli_fetch_assoc($resultname);
	 
	if($count==0)
	{
		echo "<script>grouptracker($countgroup,".$row["group"].");</script>";
		echo "<tr>";
	}
	
	if	($count!=0 && $row["group"]!=$track)
	{
		echo "<script>grouptracker($countgroup,".$row["group"].");</script>";
		$countgroup++;
		$count=0;
	echo "</tr><tr>
		";
	}		
	
	?>
	
	
	<td> <?php echo $name["name"]; ?> <input type="checkbox" id="checkbox[<?php echo $countgroup; ?>]" name="checkbox[<?php echo $countgroup; ?>][]" onchange="selecter(<?php echo $row["group"];?>,<?php echo $countgroup; ?>)" value="<?php echo $row["subid"]; ?>" /></td>
	
	
	<?php		   
			
	
		

	$count++;
	$track=$row["group"];		
	}
	
	?>
		</tr>
		</table>
		<br>
		<button type="button" class="btn pull-center" onclick="submitchecker(<?php echo $countgroup; ?>)">Submit</button>
		</form>
	<?php

}

?>

							
							
						</div>
					</div>
				</div>
			</div>
		
	
		
</body>
</html>
 
 
 
 