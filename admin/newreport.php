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
        <title>Subject Report</title>
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

  
  <title>Report Page</title>
	<style>hr {
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} </style>

   

	 <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
 


<body>


<div class="section section-breadcrumbs" >
	<div class="container">
		<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-4" align="center">
						<h1>Report</h1>
						
					</div>
					<div class="col-sm-4" align="right"><div class="actions"><a href="index.php" class="btn mine" style="font-size:1.25em; font-weight:500;">Home</a></div></div>		</div>
	</div>
</div>
<?php
include('report.php');
?>
<div class="section section-breadcrumbs">
	<div class="container">
		<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4" align="center">
				<h4 style="color:white;">See students name</h4>
				<a href="status.php"><button class="btn" align="center">Click here</button></a>
				</div>
		</div>
	</div>
</div>
	
	

</body>
</html>