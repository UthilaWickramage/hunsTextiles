<?php
require "connection.php";
use PHPMailer\PHPMailer\PHPMailer;

require './mail/Exception.php';
require './mail/PHPMailer.php';
require './mail/SMTP.php';

if(isset($_GET["email"])){
   $email = $_GET["email"];

   if(empty($email)){
      echo "please enter your email address";
   }else{
      $r = Database::select("SELECT * FROM `user` WHERE `email`='".$email."'");

      if($r->num_rows==1){
        $code = uniqid();
        Database::uid("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$email."'");
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
        $mail->Subject = 'HunsTextiles Forgot Password Verification Code'; //email subject
        $bodyContent = '<div style="text-align:center";>
        <img src="https://files.fm/thumb_show.php?i=jkd8vrs7v" height="200px" width="auto">
                        <p>Your Verification code is <b>'.$code.'</b></p>
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
        
      
      
      }else{
         echo "email address not found";
      }
   }
}else{
   echo "please enter your email address";
}
