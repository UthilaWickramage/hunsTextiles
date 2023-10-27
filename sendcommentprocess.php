<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    $customer = $_SESSION["u"]["email"];
    $pid = $_POST["id"];
    $msg = $_POST["t"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    if(empty($msg)){
        echo "Please enter a message to send";
    }else{

        Database::uid("INSERT INTO `comments` (`time_added`,`content`,`user_email`,`product_id`) VALUES ('".$date."','".$msg."','".$customer."','".$pid."')");
        echo "success";

    }

}else {
    echo "1";
}

?>