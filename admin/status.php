<?php
session_start();

if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}

include 'connection.php';
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
		<script src="../js/jquery-1.12.2.min.js"></script>
		<script src="../js/jquery-1.12.2.js"></script>        
        
		
</head>
 


<body>


<div class="section section-breadcrumbs" ">
	<div class="container">
		<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-4" align="center">
						<h1>Status</h1>
						
					</div>
					<div class="col-sm-4" align="right"><div class="actions"><a href="index.php" class="btn mine" style="font-size:1.25em; font-weight:500;">Home</a></div></div>
		</div>
	</div>
</div>



<?php
$sem=6;
//$sem=$_POST["sem"];
$sqlfalse = "SELECT fname,email FROM userdetail WHERE sem=\"".$sem."\" && choice != \"true\"";
$resultfalse = mysqli_query($con, $sqlfalse);

$sqltrue = "SELECT fname,email FROM userdetail WHERE sem=\"".$sem."\" && choice = \"true\"";
$resulttrue = mysqli_query($con, $sqltrue);

$email=array();
	
	?>
	
	<div class="section" >
					<div class="container">
						<div class="row">
						
							<div class="col-sm-6">
			<div style="margin:10px; background-color:white; padding:20px; font-weight:600; box-shadow:3px 3px 10px grey; height:20em; overflow-y: scroll;">	
	
	<h3>Student who doesn't fill choice</h3>
	<ul>
	<?php
	if (mysqli_num_rows($resultfalse) > 0) 
	{
	while($rowfalse = mysqli_fetch_assoc($resultfalse)){
		
		
		echo "<li>".$rowfalse['fname']."</li>";
		array_push($email,$rowfalse['email']);
	}
	}
	else{
		echo "All seleced choices.";
	}
	?>
	</ul>
		</div>
					</div>
	<div class="col-sm-6" >
				
	<div style=" margin:10px; background-color:white; padding:20px; font-weight:600; box-shadow:3px 3px 10px grey; height:20em; overflow-y: scroll;">
	<h3>Student who filled choice</h3>
	<ul>
	<?php
	if (mysqli_num_rows($resulttrue) > 0) 
	{
	while($rowtrue = mysqli_fetch_assoc($resulttrue)){
		
		
		echo "<li>".$rowfalse['fname']."</li>";
		
	}
	}else{
		echo "all student remain to fill choice.";
	}
	?>
	</ul>
	</div>
					</div>
				</div>
			</div>
	</div>
	
	<?php
	
$_SESSION['mailid'] = $email;
$i = count($email);
?>
<div class="section"  >
					<div class="container" style="background-color:white; padding:10px; font-weight:600; box-shadow:3px 3px 10px grey;">
						<div class="row" id="hidemail">
							<div class="col-sm-3"></div>
							<div class="col-sm-6" align="center" >
							<h4>Dou you want to send mail to unfilled students</h4>
							<button class="btn" id="showmail">Click here</button>
							</div>
							</div>
						
				

						<div class="row" id="mailshow" style="display:none;">
							<div class="col-sm-3"></div>
							<div class="col-sm-6" >
	
<h3 align="center">Email</h3>
<br>
<form action="mailsender.php" method="post">
<!--To::<input type='hidden' name='to' value='<?php		
	/*	for($i=0;$i<count($email);$i++)
		{		
				if($i != count($email)-1)
					echo "\"".$email[$i]."\",";
				else
					echo "\"".$email[$i]."\"";
		}*/
?>' readonly/><br/><br/>-->
<input type="hidden" name="iterator" value="<?php echo $i;?>"/>
Subject::<input type="text" class="form-control" name="subject" placeholder="Enter Subject"/><br/><br/>
Message::<textarea name="message" class="form-control" rows="5" cols="40" placeholder="Enter Message here"></textarea>
<br><br>
<div align="center">
<button type="submit" class="btn pull-center">Send</button>
</div>	
	</div>
</div>
</div>
</div>
				
			
	
	
<script>
	$(document).ready(function(){
			$("#showmail").click(function(){
				$("#hidemail").slideUp("fast");
				$("#mailshow").slideDown("slow");
				});
		});
</script>
</body>
</html>
