<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
  
        
        $oid = $_POST["oid"];
    $pid = $_POST["pid"];
    $email = $_POST["email"];
    $total = $_POST["amount"];
    $qty = $_POST["qty"];
    $status = "1";
    $productrs = Database::select("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
    $productnum = $productrs->num_rows;

    if($productnum==1){


    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");
    Database::uid("INSERT INTO `invoice` (`order_id`,`date`,`user_email`,`total`,`status`) VALUES ('" . $oid . "','" . $date . "','" . $email . "','" . $total . "','".$status."')");
    $lastId = Database::$connection->insert_id;

    Database::uid("INSERT INTO `invoice_item` (`invoice_id`,`product_id`,`qty`) VALUES ('" . $lastId . "','" . $pid. "','" . $qty . "')");
    echo "success";
    }
}
    

