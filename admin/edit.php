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
        <title>Edit Page</title>
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
						<h1>Edit Subject</h1>	
					</div>
					<div class="col-sm-4" align="right"><div class="actions"><a href="index.php" class="btn mine" style="font-size:1.25em; font-weight:500;">Home</a>
					</div>
					</div>
				</div>
			</div>
		</div>
	<?php
        $edit=$_GET["subid"];

include 'connection.php';

$sql = "SELECT * FROM subject WHERE subid=\"".$edit."\"";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$row = mysqli_fetch_assoc($result);
?>
        <div class="section" >
	    	<div class="container">
				<div class="row" align="center">
				<!--	<div class="error-row" style="height : 20px; width:100px; margin-left:500px;">
					<p id ="errmsg" style="padding-top:85px;"></p>
						
					</div>   -->
					<div class="col-sm-3">
				</div>
				
 					<div class="col-sm-5" >
						<div class="basic-login">
						<div style="border:3px solid #e3f2fd;padding:3%;border-radius:2%;box-shadow:0px 1px 1px grey">
							<form action="update.php" role="form" id="form1" method="post">
								<div class="form-group">
		        				 	<label for="name"><i class="icon-user"></i> <b>Subject name</b></label>
									<input class="form-control" id="subname" name="name" type="text" value="<?php echo $row["name"];?>"/>
								</div>
								
								<div class="form-group" >
								  <label for="sel1">Select Semester:</label>
								  <select class="form-control" name="sem">
									<option value="5" <?php if($row["sem"]==5){echo"selected";} ?>>5</option>
									<option value="6" <?php if($row["sem"]==6){echo"selected";} ?>>6</option>
									<option value="7" <?php if($row["sem"]==7){echo"selected";} ?>>7</option>
									<option value="8" <?php if($row["sem"]==8){echo"selected";} ?>>8</option>
								  </select>
								</div>
								 <div class="form-group">
									  <label for="shortdisc">Short Description:</label>
									  <textarea class="form-control" rows="3" id="s_txtarea" name="shortd" ><?php echo $row["shortd"];?></textarea>
								</div>
								<div class="form-group">
									  <label for="longdisc">Full Description:</label>
									  <textarea class="form-control" rows="3" id="l_txtarea" name="longd" ><?php echo $row["longd"];?></textarea>
								</div>
								<div class="form-group" >
								  <label for="sel1">Select Optionality:</label>
								  <select class="form-control" name="status">
									<option value="true">Compulsory</option>
									<option value="false">Optional</option>
									
								  </select>
								</div>
							</div>
								
							<br>
							<br>
								<input type="hidden" name="subid" value="<?php echo $edit; ?>">
								
								<div class="form-group" style="padding-top:20px;" >
									<button type="submit" class="btn pull-center" style="font-size:1.55em;">Save Changes</button><br><br><br>
									<div class="clearfix"><span id="err_submit" style="font-size:1.4em; color:red"></span></div>
								</div>
						
								
										<br>
							</form>
						</div>
					</div>
					
					
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.sequence-min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/main-menu.js"></script>
        <script src="js/template.js"></script>
<?php	} else {
    echo "0 results";
}

mysqli_close($con);
?>
    </body>
</html>
				