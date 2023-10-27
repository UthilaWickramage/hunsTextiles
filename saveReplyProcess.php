<?php
session_start();
require "connection.php";

if (isset($_SESSION["admin"])) {
    
    $cid = $_POST["cid"];
    $reply = $_POST["reply"];

    

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::uid("INSERT INTO `reply`(`reply`,`comments_id`,`time_added`) VALUES ('".$reply."','".$cid."','".$date."')");
    echo "success";
}else{
    echo "1";
}
