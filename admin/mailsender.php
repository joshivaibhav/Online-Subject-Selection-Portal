<?php
session_start();
if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}


$email = $_SESSION['mailid'];
$i = $_POST['iterator'];
$message = $_POST['message'];
$subject = $_POST['subject'];
include 'mail/send_mail.php';

for($n=0;$n<$i;$n++)
{
	$to = $email[$n];
	$mail->SetFrom($to);
	$mail->AddAddress($to);
	if(!($mail->Send()))
	{
		echo "mail error: ".$mail->ErrorInfo;
	}
}
	echo "Mail sent to the candidates..";
	echo "<a href='index.php'> Admin </a>";
?>