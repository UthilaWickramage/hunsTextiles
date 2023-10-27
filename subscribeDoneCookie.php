<?php
require "connection.php";

use PHPMailer\PHPMailer\PHPMailer;

require './phpMailer/Exception.php';
require './phpMailer/PHPMailer.php';
require './phpMailer/SMTP.php';

ob_start();
include 'mailProducts.php';
$a_div = ob_get_contents();

if (isset($_GET["email"])) {
    $email = $_GET["email"];

    $user = Database::select("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $usernum = $user->num_rows;
    if ($usernum == 1) {
        $userrow = $user->fetch_assoc();
        setcookie("subscribe_user", $email, time() + (60 * 60 * 24 * 30));


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
        
        $mail->Subject = 'HunsTextiles Thank for your Subscription'; //email subject
        $bodyContent = '<div style=" padding: 25px;">
    <div style="text-align: center;">
     <img src="https://files.fm/thumb_show.php?i=jkd8vrs7v" alt="" height="100px" width="auto">
    </div>
    <div style="text-align: center;">
        <h2>Hi!&nbsp;' . $userrow["fname"] . " " . $userrow["lname"] . '</h2>
        <h1>Thanks For Subscribing With Us</h2>

    </div>
    <div style="text-align: center;">
        <h3 style="text-transform: uppercase; ">Check Out Our Latest Products</h4>

    </div>
    <div>'
            . $a_div .
            '</div>


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
    } else {
    }
}
