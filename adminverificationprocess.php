<?php

require "connection.php";

use PHPMailer\PHPMailer\PHPMailer;

require './phpMailer/Exception.php';
require './phpMailer/PHPMailer.php';
require './phpMailer/SMTP.php';

if (isset($_POST["email"])) {
    $email = $_POST["email"];

    if (empty($email)) {
        echo "Please enter the admin email address";
    } else {
        $adminrs = Database::select("SELECT * FROM `admin` WHERE `admin_email`='".$email."'");
        $an = $adminrs->num_rows;
        if ($an == 1) {
            $code = uniqid();
            Database::uid("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `admin_email`='" . $email . "'");
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
            $mail->Subject = 'hunsTextiles Admin Verification Code'; //email subject
            $bodyContent = '<div style="text-align:center";>
            <img src="https://www.logolynx.com/images/logolynx/23/23938578fb8d88c02bc59906d12230f3.png" height="200px" width="auto">
                            <p>Your Verification code is <b>'.$code.'</b></p>
            </div>
            <div style="text-align:center; margin-top : 20px;">
                    &copy; 2021 HunsTextiles.store All Rights Reserved
                    </div>
            '; //email content
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'success';
            }
        } else {
            echo "You are not an admin";
        }
    }
} else {
    echo "Please enter the admin email address";
}
