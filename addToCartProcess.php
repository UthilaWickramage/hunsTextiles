<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $id = $_GET["id"];
    $qty = $_GET["txt"];
    $uemail = $_SESSION["u"]["email"];
    if ($qty == 0) {
        echo "please add a quantity";
    } else {
        $cartrs = Database::select("SELECT * FROM `cart` WHERE `user_email`='" . $uemail . "' AND `product_id`='" . $id . "'");
        $cn = $cartrs->num_rows;

        if ($cn == 1) {
            echo "This product is already exists in your cart";
        } else {
            $productrs = Database::select("SELECT `qty` FROM `product` WHERE `id`='".$id."'");
            $pr = $productrs ->fetch_assoc();
             if($pr["qty"]>$qty){
                Database::uid("INSERT INTO `cart` (`qty`,`product_id`,`user_email`) VALUES ('" . $qty . "','" . $id . "','" . $uemail . "')");
                echo "success";
             }else{
                 echo "Please enter a valid quantity below " .$pr["qty"].".";
             }
            
        }
    }
}else{
    echo "1";
}
