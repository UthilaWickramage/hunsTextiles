<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $mail = $_SESSION["u"]["email"];
    $pid = $_POST["id"];
    $rating = $_POST["rating"];

    $feedtxt = $_POST["feed"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::uid("INSERT INTO `feedback`(`user_email`,`product_id`,`feed`,`date_time`,`rating`) VALUES ('".$mail."','".$pid."','".$feedtxt."','".$date."','".$rating."')");
    echo "success";
}else{
    echo "1";
}
