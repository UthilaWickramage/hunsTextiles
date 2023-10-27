<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $oid = $_POST["oid"];
    $email = $_POST["email"];
    $total = $_POST["amount"];
    $status = "1";
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::uid("INSERT INTO `invoice` (`order_id`,`date`,`user_email`,`total`,`status`) VALUES ('" . $oid . "','" . $date . "','" . $email . "','" . $total . "','" . $status . "')");

    $cartrs = Database::select("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
    $cn = $cartrs->num_rows;

    for ($i = 0; $i < $cn; $i++) {
        $cf = $cartrs->fetch_assoc();
        $prors = Database::select("SELECT * FROM `product` WHERE `id`='" . $cf["product_id"] . "'");
        $profr = $prors->fetch_assoc();

        // $old_qty = $profr["qty"];
        $cart_qty = $cf["qty"];
        // $new_qty = $old_qty - $cart_qty;



        // Database::uid("UPDATE `product` SET `qty`='" . $new_qty . "' WHERE `id`='" . $profr["id"] . "'");



        $inrs = Database::select("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
        $inrow = $inrs->fetch_assoc();

        Database::uid("INSERT INTO `invoice_item` (`invoice_id`,`product_id`,`qty`) VALUES ('" . $inrow["id"] . "','" . $profr["id"] . "','" . $cart_qty . "')");

        Database::select("DELETE FROM `cart` WHERE `product_id`='" . $profr["id"] . "' AND `user_email`='" . $email . "'");
    }


    echo "success";
}
