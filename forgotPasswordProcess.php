<?php
require "./config/connection.php";
use PHPMailer\PHPMailer\PHPMailer;

require './mail/Exception.php';
require './mail/PHPMailer.php';
require './mail/SMTP.php';



if(isset($_GET["e"])){
    $email = $_GET["e"];

    if(empty($email)){
        echo "please enter your email address";
    }else{
        $r = Database::select("SELECT * FROM `user_details` WHERE `email`='".$email."'");
        if($r->num_rows==1){
            $code = uniqid();
            Database::uid("UPDATE `user_details` SET `verification_code`='".$code."' WHERE `email`='".$email."'");
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com'; //our email provider company use this for gmail only
            $mail->SMTPAuth = true;
            $mail->Username = 'hansasolutions00@gmail.com'; //sending email(my email)
            $mail->Password = 'KLV32uhw'; //sending email(my email) password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('hansasolutions00@gmail.com', 'eCommerce'); //sending email
            $mail->addReplyTo('hansasolutions00@gmail.com','eCommerce'); //reply mail
            $mail->addAddress($email); //recieving email
            $mail->isHTML(true);
            $mail->Subject = 'eCommerce Forgot Password Verification Code'; //email subject
            $bodyContent = ' <center>
            
            <img src="https://i.im.ge/2021/09/11/QeMgrF.png" height="150px" width="auto">
            
           
            </center>
                            <p>Your Verification code is <b>'.$code.'</b></p>
                            <p>You can reset your password with this verification code continue your deep journey through HUNS</p>
                            
                            '; //email content
            $mail->Body    = $bodyContent;
            
            if (!$mail->send()) {
               echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
               echo 'success';
            }
        }else{
            echo "email not found";
        }
    }

}else{
    echo "please enter your email address";
}


?>