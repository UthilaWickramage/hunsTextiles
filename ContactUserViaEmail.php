<?php
require "connection.php";

use PHPMailer\PHPMailer\PHPMailer;

require './phpMailer/Exception.php';
require './phpMailer/PHPMailer.php';
require './phpMailer/SMTP.php';

$msg = $_POST["msg"];
$email = $_POST["email"];

$userrs = Database::select("SELECT * FROM `user` WHERE `email`='".$email."'");
$usernum = $userrs->num_rows;

if($usernum==1){
$userrow = $userrs->fetch_assoc();

$code = uniqid();
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com'; //our email provider company use this for gmail only
$mail->SMTPAuth = true;
$mail->Username = 'hansasolutions00@gmail.com'; //sending email(my email)
$mail->Password = 'UthilaMSI2021'; //sending email(my email) password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('hansasolutions00@gmail.com', 'hunsTextiles'); //sending email
$mail->addReplyTo('hansasolutions00@gmail.com', 'hunsTextiles'); //reply mail
$mail->addAddress($email); //recieving email
$mail->isHTML(true);

$mail->Subject = 'HunsTextiles Admin Messages'; //email subject
$bodyContent = '<div style=" padding: 25px;">
<div style="text-align: center;">
<img src="https://files.fm/thumb_show.php?i=jkd8vrs7v" alt="" height="100px" width="auto">
</div>
<div style="text-align: center;">
<h2>Hey!&nbsp;' . $userrow["fname"] . " " . $userrow["lname"] . '</h2>
<h4 style="text-transform:uppercase;">Admin Says</h4>

</div>
<div style="text-align: center;">
<p style="font-size="34px">'.$msg.'</p>

</div>



<div style="text-align: center; margin-top: 20px;">
<button style="font-size:20px; color: white; background-color: rgb(50, 50, 255); padding: 15px; border: none; border-radius: 5px;">Start Shopping</button>
</div>
<div style="text-align:center; margin-top : 20px;">
&copy; 2021 HunsTextiles.store All Rights Reserved
</div>
</div>'; //email content
$mail->Body    = $bodyContent;

if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'success';
}
}
