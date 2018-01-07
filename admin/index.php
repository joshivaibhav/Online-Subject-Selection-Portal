<?php
session_start();

if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}

?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Welcome Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<script src="../js/jquery-1.12.2.min.js"></script>
		<script src="../js/jquery-1.12.2.js"></script>        
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/leaflet.css" />
		<link rel="stylesheet" href="../css/main.css">  
		
		<script>
		$(document).ready(function(){
			$("#open").click(function(){
				$("#reportsem").slideUp("fast");
				$("#seesem").slideUp("fast");
				$("#choicesem").slideToggle("fast");
			});
		});
		 
		$(document).ready(function(){
			$("#see").click(function(){
				$("#reportsem").slideUp("fast");
				$("#choicesem").slideUp("fast");
				$("#seesem").slideToggle("fast");
			});
		});

		$(document).ready(function(){
			$("#report").click(function(){
				$("#choicesem").slideUp("fast");
				$("#seesem").slideUp("fast");
				$("#reportsem").slideToggle("fast");
			});
		});
		</script>
		<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
 


<body>
<div class="section section-breadcrumbs" >
<div align="right" style="padding-right:20px;"><a href="logout.php">
		<img style="width:2.5em;" src="../img/logout.png"><span style="color:white; font-weight:600; font-size:1.2em;">Logout</span>
</a></div>
	<div class="container">
		<div class="row">
		
			<div class="col-md-12" style="text-align :center; margin-top:-29px;">
		<div style="font-size:2.75em;color:white;
    font-family: 'Open Sans', sans-serif;
    font-weight: 800;">Admin</div>
			</div>
		
		</div>
	</div>
</div>

<div class="container" style="padding-top:10%;">
	<div class="row">
		<div class="col-md-12" style="text-align :center; ">
			<div class="btn-group-vertical" >
				<a class="btn btn-primary" href="add.php" style="font-size:1.5em; border-bottom: 3.5px solid white;">Add Subject Manually</a>
				<button class="btn btn-primary" id="see"  style="font-size:1.5em;border-bottom: 3.1px solid white;">See Subjects</button>
				<div id="seesem" style="display:none;background: none repeat scroll 0 0 #ffffff; color:black;font-weight:700; padding:10px;">
					<form action="see.php" method="post">
						Sem:<select name="sem">
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						</select>
						<br><br>
						<input class="btn" type="submit" value="next">
					</form>
				</div>
			
				<button class="btn btn-primary" id="open"  style="font-size:1.5em;border-bottom: 3.1px solid white;">Subject Choice</button>
				<div id="choicesem" style="display:none;background: none repeat scroll 0 0 #ffffff; color:black;font-weight:700; padding:10px;">
					<form action="newchoice.php" method="post">
						Sem:<select name="sem">
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						</select>
						<br><br>
						<input class="btn" type="submit" value="next">
					</form>
				</div>
				
				<button class="btn btn-primary" id="report"  style="font-size:1.5em;border-bottom: 3.1px solid white;	">View Report</button>
				<div id="reportsem" style="display:none;background: none repeat scroll 0 0 #ffffff; color:black;font-weight:700; padding:10px;">
					<form action="newreport.php" method="post">
						Sem:<select name="sem">
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						</select>
						<br><br>
						<input class="btn" type="submit" value="next">
					</form>
				</div>
							<a class="btn btn-primary" href="timeselect.php" style="font-size:1.5em; border-bottom: 3.5px solid white;">Set Time Limit</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>