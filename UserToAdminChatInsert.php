<?php
require "connection.php";
$msg = $_POST["msg"];
$email = $_POST["email"];

$customer = Database::select("SELECT * FROM `user` WHERE `email`='".$email."'");
$cusnum = $customer->num_rows;

if($cusnum==1){
    $cusrow = $customer->fetch_assoc();
    $admin  = Database::select("SELECT * FROM `admin`");
    $adminrow = $admin->fetch_assoc();
    $aemail = $adminrow["admin_email"];

    $d = new DateTime();
           $tz = new DateTimeZone("Asia/Colombo");
           $d->setTimeZone($tz);
           $date = $d->format("Y-m-d H:i:s");

    Database::select("INSERT INTO `admin_user_chat`(`chat`,`date_time`,`from`,`to`) VALUES ('".$msg."','".$date."','".$email."','".$aemail."')");
    echo "1";
}
?>