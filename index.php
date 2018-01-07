<?php
session_start();
//echo $_SESSION["client_captcha_count"];
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Login Page</title>
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
	var count=<?php if(isset($_SESSION["client_captcha_count"])){echo $_SESSION["client_captcha_count"];}else{echo "0";}?>;
	function abc()
	{
		if(count>=2)
				{
					document.getElementById("showcaptcha").style.display="inline";
				}
	}
	
	
									function check()
									{
									
									var y=document.getElementById("password").value;
									var x=document.getElementById("username").value;
									
									if(count>=2){
									var cap=document.getElementsByName("captcha_code")[0].value;
									}
									
									
									var xmlhttp = new XMLHttpRequest();
									xmlhttp.onreadystatechange = function() {
										
										
								//	alert(xmlhttp.readyState);
									if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
										
										if(xmlhttp.responseText=="done")
										{
											window.location="homepage.php";
										}
										else
										{
										window.alert(xmlhttp.responseText);
										count++;
										}
										if(count>=2)
										{
											document.getElementById("showcaptcha").style.display="inline";
										}
										
									}
									}
									
										
									if(count>=2)
									{
										xmlhttp.open("GET", "varify.php?username="+x+"&password="+y+"&c="+cap, true);
									}
									else
									{
										xmlhttp.open("GET", "varify.php?username="+x+"&password="+y, true);
									}
											
										
									
																						
									
											xmlhttp.send();
									
									
									
									}
									
									
								</script>
	
	
	
	<script type='text/javascript'>
		function refreshCaptcha(){
		var img = document.images['captchaimg'];
		img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
		}</script>
        
	</head>
    <body onload="abc()">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

      
        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Login</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-9" style="padding-left:20%; padding-top:5%;">
						<div class="basic-login">
							<form role="form" role="form">
								<div class="form-group">
		        				 	<label for="login-username"><i class="icon-user"></i> <b>Username or Email</b></label>
									<input class="form-control" name="uname" id="username" type="text" placeholder="Username...">
								</div>
								<div class="form-group">
		        				 	<label for="login-password"><i class="icon-lock"></i> <b>Password</b></label>
									<input class="form-control" name="pass" id="password" type="password" placeholder="Password...">
								</div>
								
								
								
								<div class="form-group" id="showcaptcha" style="display:none;">
		        				 	<label for="captcha-code"><i class="icon-lock"></i> <b>Prove that you're not a Robot</b></label><br>
									<table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
									<?php if(isset($msg)){?>
								<tr>
									<td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
								</tr>
									<?php } ?>
								<tr>
								<td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
										<label for='message'>Enter the code above here :</label>
								<br>
								<input id="captcha_code" name="captcha_code" id="cc" type="text">
								<br>
									Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</td>
								</tr>
								<tr>
								<td>&nbsp;</td>
								</table>
								</div>		
								
								
								
								
								<div class="form-group">
									<!--<label class="checkbox">
										<input type="checkbox"> Remember me
									</label>-->
									<!--<a href="page-password-reset.html" class="forgot-password">Forgot password?</a>-->
									<button type="button" class="btn pull-right" onclick="check()">Login</button>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
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