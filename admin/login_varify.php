<?php

session_start();

if($_POST["admin"]=="admin" AND $_POST["adpass"]=="bigadmin" )
{
	if(isset($_SESSION["captcha_code"]))
	{
	  if($_POST["captcha_code"]===$_SESSION["captcha_code"])
	  {
			if(isset($_SESSION["captcha_count"]))
			{
				$_SESSION["captcha_count"]=0;
			
			}
			if(isset($_SESSION["captcha_code"]))
			{
				unset($_SESSION["captcha_code"]);
			
			}
		 $_SESSION["admin"]="admin";
		
		header("Location: index.php");	

	  }
	  else
	  {
		  	header("Location:login.php?msg=invalid captcha");
	  }
	}
	else
	{
			if(isset($_SESSION["captcha_count"]))
			{
				$_SESSION["captcha_count"]=0;
			}
			if(isset($_SESSION["captcha_code"]))
			{
				unset($_SESSION["captcha_code"]);
			
			}						
			$_SESSION["admin"]="admin";
			header("Location:index.php");
	}
	  
}
else
{
	if(!isset($_SESSION["captcha_count"])){
		$_SESSION["captcha_count"]=0;
	}
	$_SESSION["captcha_count"]++;
	header("Location:login.php?msg=invalid username & password");
}



?>