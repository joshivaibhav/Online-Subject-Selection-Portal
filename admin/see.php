<?php
session_start();

if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}

if(isset($_POST["sem"]))
{
	$csem=$_POST["sem"];
	$_SESSION["showsem"]=$csem;
}
else{
	if(isset($_SESSION["showsem"]))
	{
		$csem=$_SESSION["showsem"];
	}else{
	header("Location:index.php");
	}
}


?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>See The Subjects</title>
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
		<script src="../js/jquery-1.12.2.min.js"></script>
		<script src="../js/jquery-1.12.2.js"></script>
        
		<link rel="stylesheet" href="../fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
		
	
		<script type="text/javascript" src="../fancybox/source/jquery.fancybox.pack.js"></script>

		
	
    	
		<script src="../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
						<h1>Subject</h1>
					</div>
					<div class="col-sm-4" align="right"><div class="actions"><a href="index.php" class="btn mine" style="font-size:1.25em; font-weight:500;">Home</a></div>
					</div>
					
				</div>
			</div>
		</div>
        
<?php


include 'connection.php';

$sql = "SELECT subid,name,sem,status FROM subject WHERE sem=".$csem;
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
 
?>
		
        <div class="section">
	    	<div class="container">
				
				<div class="row">
					<div class="col-md-12" >
						<!-- Shopping Cart Items -->
						<table class="shopping-cart">
							<!-- Shopping Cart Item -->
							
							<?php
							while($row = mysqli_fetch_assoc($result)) {
							?>
							
							<tr style="box-shadow:2px 2px 10px grey;">
								
								<td><?php echo $row["name"]?></td>
								<td>sem:<?php echo $row["sem"]?></td>
								<td><?php if($row["status"]=="true"){echo "compulsary";}else{echo "Optional";}?></td>
								<td><a class="btn btn-primary" href="edit.php?subid=<?php echo $row["subid"];?>" style="font-size:1em; font-weight:600;">Edit</a></td>
								<td><a class="btn btn-primary" href="del.php?subid=<?php echo $row["subid"];?>" style="font-size:1em; font-weight:600;">Delete</a></td>
							</tr>
							<?php } ?>
							
							</table>
						
					</div>
				</div>
				</div>
		</div>
<?php } ?>
	 


		<script>
		<?php
		
		if(isset($_GET["msg"]))
		{
			echo "alert(\"".$_GET["msg"]."\");";
		}
		?>
		
		</script>
		
		
	
        <!-- Javascripts -->
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