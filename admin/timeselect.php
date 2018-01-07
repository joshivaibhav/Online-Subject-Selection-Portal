<?php
session_start();
if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
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
        <title>Select Time Limit</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<script src="../js/jquery-1.12.2.min.js"></script>
		<script src="../js/jquery-1.12.2.js"></script>
          <link rel="stylesheet" href="../css/jquery-ui.css">
  <script src="../js/jquery-1.10.2.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="../css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="../css/main.css">
		
        <script src="../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

       
        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row" align="center">
						<div class="col-sm-4"></div>
					<div class="col-sm-4" align="center">
						<h1>Set Time</h1>
						
					</div>
					<div class="col-sm-4" align="right"><div class="actions"><a href="index.php" class="btn mine" style="font-size:1.25em; font-weight:500;">Home</a></div></div>
				</div>
			</div>
		</div>
		
		
		
		 <div class="section">
	    	<div class="container">
				<div class="row" align="center">
					<div class="col-sm-4"></div>
					<div class="col-sm-4" >
						<div class="basic-login">
							<form role="form" role="form" action="timesubmit.php" method="post">
								<p>Start Date: <input type="text" name="stdate" id="datepicker1"></p>
								<p>End Date: <input type="text" name="enddate" id="datepicker2"></p>
								<input type="submit" class="btn" value="set">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		  <script>
  $(function() {
    $( "#datepicker1" ).datepicker();
  });
  
  $(function() {
    $( "#datepicker2" ).datepicker();
  });
  
  <?php
  if(isset($_GET["msg"]))
  {
	  echo "alert(\"".$_GET["msg"]."\");";
  }
  ?>
  </script>
		
</body>
</html>        
