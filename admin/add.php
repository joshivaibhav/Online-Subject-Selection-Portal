

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Add Subject Details</title>
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
		<style>
		
		
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
						<h1>Add new subject</h1>
						
					</div>
					<div class="col-sm-4" align="right"><div class="actions"><a href="index.php" class="btn mine" style="font-size:1.25em; font-weight:500;">Home</a></div></div>
				</div>
			</div>
		</div>
        
        <div class="section" >
	    	<div class="container">
				<div class="row" align="center">
				<!--	<div class="error-row" style="height : 20px; width:100px; margin-left:500px;">
					<p id ="errmsg" style="padding-top:85px;"></p>
						
					</div>   -->
					<div class="col-sm-3">
				</div>
				
 					<div class="col-sm-6" >
						<div class="basic-login">
						<div style="border:3px solid #e3f2fd;padding:3%;border-radius:2%;box-shadow:0px 1px 1px grey">
							<form action="add_script.php" role="form" id="form1">
								<div class="form-group">
		        				 	<label for="name"><i class="icon-user"></i> <b>Subject name</b></label>
									<input class="form-control" id="subname" name="name" type="text" placeholder="Subject Name Here" onblur="validate('subname')" onfocus="clear_area('subname')"/>
								</div>
								
								<div class="form-group" >
								  <label for="sel1">Select Semester:</label>
								  <select class="form-control" name="sem">
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								  </select>
								</div>
								 <div class="form-group">
									  <label for="shortdisc">Short Description:</label>
									  <textarea class="form-control" rows="3" id="s_txtarea" name="shortd" onblur="validate('s_txtarea')" onfocus="clear_area('s_txtarea')"></textarea>
								</div>
								<div class="form-group">
									  <label for="longdisc"> Long Description:</label>
									  <textarea class="form-control" rows="3" id="l_txtarea" name="longd" onblur="validate('l_txtarea')" onfocus="clear_area('l_txtarea')"></textarea>
								</div>
								<div class="form-group" >
								  <label for="sel1">Select Optionality:</label>
								  <select class="form-control" name="ststus">
									<option value="true">Compulsory</option>
									<option value="false">Optional</option>
									
								  </select>
								</div>
							</div>
								
							<br>
							<br>
							
								<hr style="width:40%;">
								
								<div class="form-group" >
									<button type="button" class="btn pull-center" onclick="sub_check()" style="font-size:1.65em;">Submit</button><br><br><br>
									<div class="clearfix"><span id="err_submit" style="font-size:1.4em; color:red"></span></div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-3" style="background:none">
							<div style="position:absolute">
							<br><br><br>
								<div class="form-group">
		        				 	<label for="name_err"><span id="n_err" style="color:red"></span></label>
								</div>
								<br><br><br>
								<div class="form-group" >
								  <label for="sel1_err"><span style="color:red"></span></label>
								</div>
								<br><br><br>
								 <div class="form-group">
									  <label for="shortdisc_err"><span id="sdesc_err" style="color:red"></span></label>
										</div>
										<br><br><br><br>
								<div class="form-group">
									  <label for="longdisc_err"><span id="ldesc_err"style="color:red"></span></label>
								</div>
								<br><br><br><br><br>
								<div class="form-group" >
								  <label for="sel1_err"><span style="color:red"></span></label>
								 </div>
								 <br><br><br>
								<div>
									<label for="fileupload"></label>
								</div>
					
						</div>
					
						
					</div>
				
				</div>
			</div>
		</div>

	 
        <!-- Javascripts -->
		<script>
		function validate(errmsg)
		{
			var text;
			if(errmsg === "subname")
			{
				var x=document.getElementById("subname").value;
				if(x.length === 0){
				text="Subject name cannot be empty!";
				document.getElementById("n_err").innerHTML=text;
				}
			}
			else if(errmsg === "s_txtarea")
			{
				var x=document.getElementById("s_txtarea").value;
				if(x.length === 0){
				text="Please provide a short description";
				document.getElementById("sdesc_err").innerHTML=text;
				}
			}
			else if(errmsg === "l_txtarea")
			{
				var x=document.getElementById("l_txtarea").value;
				if(x.length === 0){
				text="Please provide a long description";
				document.getElementById("ldesc_err").innerHTML=text;}
			}
			
		}
		
		function clear_area(str)
		{
			if(str==="subname")
			{
				document.getElementById("n_err").innerHTML="";
			}
			else if(str === "s_txtarea")
			{
				document.getElementById("sdesc_err").innerHTML="";
				
			}
			else if(str === "l_txtarea")
			{
				document.getElementById("ldesc_err").innerHTML="";
			}
		}
		function sub_check()
		{
				
				var x=document.getElementById("subname").value;
				var y=document.getElementById("s_txtarea").value;
				var z=document.getElementById("l_txtarea").value;
				
				if(x.length === 0 || y.length === 0 || z.length === 0){
					
					document.getElementById("err_submit").innerHTML="Please fill up all the fields.";
				}
				else{
				document.getElementById("form1").submit();
				}
			
		}		
		</script>
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