<?php 
session_start();
if(!isset($_SESSION["user"]))
{
	header("Location: index.php");
}
include("subject.php");

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>DDIT</title>
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
		<script src="../js/jquery-1.12.2.min.js"></script>
		<script src="../js/jquery-1.12.2.js"></script>
        
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
		<style>
		.mine{
			background: none repeat scroll 0 0 #fff;
			color:black;
			
		}
		.mine:hover
		{
			background: none repeat scroll 0 0 #0b5b8d;
			color:white;
		}
		
		</style>
    </head>
    <body>
        
       
    <div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="col-sm-6" align="left"><h1>HomePage</h1></div>
						<div class="col-sm-6" align="right">
						<a href="logout.php"><div align="right" style="padding-right:20px;">
								<img style="width:2.5em;" src="img/logout.png"><span style="color:white; font-weight:600; font-size:1.2em;">Logout</span>
						</div></a>
					</div>
					</div>
				</div>
			</div>
		</div>
		   
		
		    <div class="eshop-section section">
	


	<div class="container">
	    		
				<div class="row">
					
					
					<?php
						for($i=0;$i<count($subname);$i++)
						{
					?>
					
					<div class="col-sm-4">
						<div class="shop-item">
							
							<div class="title" style="font-size: 1.5em;position:relative">
								<h3><a href="subinfo.php?subid=<?php echo $subid[$i];?>"><?php echo $subname[$i];?></a></h3>
							</div>	
							<div class="price" style="font-size: 1em; position:relative"><?php if($status[$i]=="true"){echo "Compulsary";}else{echo "Optional";}?>
							</div>
							<div class="description" style="position:relative; text-align:center; height:14em;">
								<p><?php echo $shortd[$i];?></p>
							</div>
							<!--<div class="service-wrapper">
							<p><?php echo $shortd[$i];?></p>
							</div>-->
							<div class="actions">
								<a href="subinfo.php?subid=<?php echo $subid[$i];?>" class="btn"><i class="icon-shopping-cart icon-white"></i> See Details</a> 
							</div>
						</div>
					</div>
					
					<?php
						}
					?>
				</div>

				
		<!--<div class="pagination-wrapper ">      		nice design i should use it.
					<ul class="pagination pagination-lg">
						<li class="disabled"><a href="#">Previous</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
						<li><a href="#">8</a></li>
						<li><a href="#">9</a></li>
						<li><a href="#">10</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div>-->
			</div>
	    </div>

				
	
		<div style="height:95px; width:100%:"></div>
		
	
	    <!-- Footer -->
	    <?php
		include 'admin/connection.php';
				
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
						?>
		<div class="footer" style="position:fixed; bottom:0px; width:100%;">
	    	<div class="container">
				<div class="row">
					<div class="col-md-12" style="padding:10px; text-align:center;">
		    			<div style="color:white; font-weight:600; font-size:1.5em;">Choose Optional Subjects Here</div>
		    		</div>
				</div>
				<div class="row">
		   	   		<div class="col-md-12" style="text-align:center; padding-top:10px;">
		    			<div class="actions"><a href="status.php" class="btn mine" style="font-size:1.25em; font-weight:500;">Fill Choice</a></div>
		    		</div>
				</div>
		    	</div>
		    </div>
	    </div>
		
 
				
				
				<?php
				}else if($diff1->format("%R")==="-" && $diff2->format("%R")==="-"){
				?>
		<div class="footer" style="position:fixed; bottom:0px; width:100%;">
	    	<div class="container">
				<div class="row">
					<div class="col-md-12" style="padding:10px; text-align:center;">
		    			<div style="color:white; font-weight:600; font-size:1.5em;">Choosing process will start on </div>
		    		</div>
				</div>
				<div class="row">
		   	   		<div class="col-md-12" style="text-align:center; padding-top:10px;">
		    			<div style="color:white; font-weight:600; font-size:1.5em;"><?php echo date_format($date1,"d/m/Y"); ?> </div>
		    		</div>
				</div>
		    	</div>
		    </div>
	    </div>
		
 



				<?php
				}
				else if($diff1->format("%R")==="+" && $diff2->format("%R")==="+")
				{
				?>
	<div class="footer" style="position:fixed; bottom:0px; width:100%;">
	    	<div class="container">
				<div class="row">
					<div class="col-md-12" style="padding:10px; text-align:center;">
		    			<div style="color:white; font-weight:600; font-size:1.5em;">Choice system ended</div>
		    		</div>
				</div>
				<!--<div class="row">
		   	   		<div class="col-md-12" style="text-align:center; padding-top:10px;">
		    			<div class="actions"><a href="result.php" class="btn mine" style="font-size:1.25em; font-weight:500;">Result</a></div>
		    		</div>
				</div>-->
		    	</div>
		    </div>
	    </div>
		
 



			<?php
				}


		?>
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