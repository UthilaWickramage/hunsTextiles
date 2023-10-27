<?php
session_start();
require "connection.php";



$pid = $_POST["pid"];
$title =  $_POST["title"];
$qty = $_POST["qty"];
$cwc = $_POST["cwc"];
$coc = $_POST["coc"];
$desc = $_POST["desc"];


$searchProduct = Database::select("SELECT * FROM `product` WHERE `id` = '".$pid."'");
$searchn = $searchProduct->num_rows;

if($searchn==1){
    Database::select("UPDATE `product` SET `title`='".$title."',`qty`='".$qty."',`deliver_fee_colombo`='".$cwc."',`deliver_fee_outside_colombo`='".$coc."',`description`='".$desc."' WHERE `id`='".$pid."'");

    echo "1";
    

    
}else{
   echo "2";
}



?>