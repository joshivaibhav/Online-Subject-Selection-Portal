<?php



session_start();
$uname=$_REQUEST["username"];
$pass=$_REQUEST["password"];
//$uname="jay";
//$pass="joshi";
if(isset($_REQUEST["c"]))
{
	$captcha=$_REQUEST["c"];
}
else
{
	
}



if($uname==""||$uname==null)
{
	echo "uname cannot be blank";
	if(!isset($_SESSION["client_captcha_count"]))
			{
				$_SESSION["client_captcha_count"]=0;
			}
			$_SESSION["client_captcha_count"]++;
			
}
else
{
	
	if($pass==""||$pass==null)
	{
		echo "pass cannot be blank";
	if(!isset($_SESSION["client_captcha_count"]))
			{
				$_SESSION["client_captcha_count"]=0;
			}
			$_SESSION["client_captcha_count"]++;
			
	}
	else
	{
		$con = mysqli_connect('localhost','root','');
			if (!$con) {
				die('Could not connect: ' . mysqli_error($con));
			}
			
		
		mysqli_select_db($con,"project_db");
		
		$sql="SELECT * FROM user WHERE id = '".$uname."' AND password = '".$pass."'";
		$result = mysqli_query($con,$sql);
		
		if((mysqli_num_rows($result) > 0))
		{
				
				$sql="SELECT sem FROM userdetail WHERE id= '".$uname."'   ";
				$result = mysqli_query($con,$sql);
				
				if (mysqli_num_rows($result) > 0) {
				
				$row = mysqli_fetch_assoc($result);
				
				}
				
				
					
			
											
			
			if(isset($_SESSION["client_captcha_count"]))
			{
				if($_SESSION["client_captcha_count"]>=2)
				{
				
				if($_SESSION["captcha_client_code"]===$captcha)
				{
					$_SESSION["sem"]=$row["sem"];
					$_SESSION["user"]=$uname;
					echo"done";
					$_SESSION["client_captcha_count"]=0;
					mysqli_close($con);
				}
				else
				{
					echo "captcha incorrect";
					if(!isset($_SESSION["client_captcha_count"]))
					{
						$_SESSION["client_captcha_count"]=0;
					}
					$_SESSION["client_captcha_count"]++;
			
					mysqli_close($con);
				}
			}
			else
			{
					$_SESSION["sem"]=$row["sem"];
					$_SESSION["user"]=$uname;
					$_SESSION["client_captcha_count"]=0;
					echo"done";
					mysqli_close($con);
			}
			
			}
			else
			{
				$_SESSION["sem"]=$row["sem"];
					$_SESSION["user"]=$uname;
					echo"done";
					$_SESSION["client_captcha_count"]=0;
					mysqli_close($con);
			}
			
		}
		else
		{
			if(!isset($_SESSION["client_captcha_count"]))
			{
				$_SESSION["client_captcha_count"]=0;
			}
			$_SESSION["client_captcha_count"]++;
			echo "Wrong username or password";
			mysqli_close($con);
		}
		
	}
}



?>