<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    $uemail = $_SESSION["u"]["email"];
    $pid =  $_GET["id"];

$watchlistrs = Database::select("SELECT * FROM `watchlist` WHERE `product_id`='".$pid."' AND `user_email`='".$uemail."'");
$n = $watchlistrs->num_rows;

if($n==1){
    echo "You have already have this product in your wishlist";
}else{
    Database::uid("INSERT INTO `watchlist` (`product_id`,`user_email`) VALUES ('".$pid."','".$uemail."')");

    echo "success";
}

    
}else{
echo "Please sign in to continue";
}
