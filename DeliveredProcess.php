<?php
require "connection.php";

use PHPMailer\PHPMailer\PHPMailer;

require './phpMailer/Exception.php';
require './phpMailer/PHPMailer.php';
require './phpMailer/SMTP.php';
$oid = $_GET["oid"];

$irs = Database::select("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
$irnum = $irs->num_rows;


if ($irnum == 1) {
    Database::uid("UPDATE `invoice` SET `status`=4 WHERE `order_id`='" . $oid . "'");
    $iirow = $irs->fetch_assoc();
    $users = Database::select("SELECT * FROM `user` WHERE `email`='" . $iirow["user_email"] . "'");
    $userrow = $users->fetch_assoc();
    $email = $userrow["email"];

    $iirs = Database::select("SELECT * FROM `invoice_item` WHERE `invoice_id`='" . $iirow["id"] . "'");
    $iinum = $iirs->num_rows;
    if ($iinum > 0) {
        for ($c = 0; $c < $iinum; $c++) {
            $iirow = $iirs->fetch_assoc();
            $prs = Database::select("SELECT * FROM `product` WHERE `id`='" . $iirow["product_id"] . "'");
            $prnum = $prs->num_rows;
            if ($prnum == 1) {
                $prrow = $prs->fetch_assoc();
                $old_qty = $prrow["qty"];
                $in_qty = $iirow["qty"];
                $new_qty = $old_qty - $in_qty;
                Database::uid("UPDATE `product` SET `qty`='" . $new_qty . "' WHERE `id`='" . $prrow["id"] . "'");
                

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

                $mail->Subject = 'HunsTextiles Time to Unbox'; //email subject
                $bodyContent = '<div style=" padding: 25px;">
<div style="text-align: center;">
<img src="https://files.fm/thumb_show.php?i=jkd8vrs7v" alt="" height="100px" width="auto">
</div>
<div style="text-align: center;">
<h2>Hey!&nbsp;' . $userrow["fname"] . " " . $userrow["lname"] . '</h2>


</div>
<div style="text-align: center;">
<h3>Order No:' . $oid . '</h3>
<p style="font-size="34px">We are so exited to tell you that your package has been delivered. Unbox and enjoy.</p>

<p style="font-size="34px">And you are welcome to write us about our service. </p>

</div>



<div style="text-align: center; margin-top: 10px;">
<button style="font-size:20px; color: white; background-color: rgb(50, 50, 255); padding: 15px; border: none; border-radius: 5px;">Write a Review</button>
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
        }
    }
} else {
}
