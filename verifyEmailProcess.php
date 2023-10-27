<?php
session_start();
require "connection.php";
use PHPMailer\PHPMailer\PHPMailer;

require './phpMailer/Exception.php';
require './phpMailer/PHPMailer.php';
require './phpMailer/SMTP.php';
$email = $_GET["e"];

$e_vc_code = uniqid();

$_SESSION["e"] = $e_vc_code;

$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com'; //our email provider company use this for gmail only
$mail->SMTPAuth = true;
$mail->Username = 'hansasolutions00@gmail.com'; //sending email(my email)
$mail->Password = 'UthilaMSI2021'; //sending email(my email) password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('hansasolutions00@gmail.com', 'hunsTextiles'); //sending email
$mail->addReplyTo('hansasolutions00@gmail.com','hunsTextiles'); //reply mail
$mail->addAddress($email); //recieving email
$mail->isHTML(true);
$mail->Subject = 'HunsTextiles Email Verification Code'; //email subject
$bodyContent = '<div style="text-align:center";>
<img src="https://files.fm/thumb_show.php?i=jkd8vrs7v" height="200px" width="auto">
<p>Hi! New user, Before you go we needed to confirm that it is really you. You can copy the below code and paste it on the popup model and you are good to go.<br> sorry for the inconvenience caused</p>
                <p>Your Email Verification code is <b>'.$e_vc_code.'</b></p>
</div>

                
            <div style="text-align:center; margin-top : 20px;">
            &copy; 2021 HunsTextiles.store All Rights Reserved
            </div>'; //email content
                
$mail->Body    = $bodyContent;

if (!$mail->send()) {
   echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo 'success';
}



?>