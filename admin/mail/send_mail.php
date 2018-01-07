<?php
require_once('mail/class.phpmailer.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Posrt = 587;
$mail->IsHTML(true);
$mail->Username = "ddusubjectselection@gmail.com";
$mail->Password = "subjectselection";
$mail->Subject = $subject;
$mail->Body = $message
?>
