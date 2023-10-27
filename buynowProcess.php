<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $id = $_GET["id"];
    $qty =  $_GET["qty"];
    $uemail = $_SESSION["u"]["email"];

    $array;

    $orderID = uniqid();

    $productrs = Database::select("SELECT * FROM `product` WHERE `id`='" . $id . "'");
    $pr = $productrs->fetch_assoc();

    $addressrs = Database::select("SELECT * FROM `user_has_address` WHERE `user_email`='" . $uemail . "'");
    $an = $addressrs->num_rows;


    if ($an == 1) {
        $cartrs = Database::select("SELECT * FROM `cart` WHERE `user_email`='".$uemail."' AND `product_id`='".$id."'");
        $cartnum = $cartrs->num_rows;
        if($cartnum==1){
            $cartr = $cartrs->fetch_assoc();

            Database::uid("DELETE FROM `cart` WHERE `id`='".$cartr["id"]."'");
        }
        $ar = $addressrs->fetch_assoc();

        $city_id = $ar["city_id"];

        $cityrs = Database::select("SELECT * FROM `city` WHERE `id`='" . $city_id . "'");
        $cr = $cityrs->fetch_assoc();

        $district_id = $cr["district_id"];

        $delivery = "0";

        if ($district_id == "1") {
            $delivery = $pr["deliver_fee_colombo"];
        } else {
            $delivery = $pr["deliver_fee_outside_colombo"];
        }

        $inr = Database::select("SELECT * FROM `invoice` WHERE `user_email`='".$uemail."'");
        $innum = $inr->num_rows;
        $iprice = $pr["price"];

        if($innum>=20){
            $dprice = (int)$iprice/100*15;
           
            $newprice = $iprice-$dprice;
            $n_price = round($newprice);
        }else if($innum>=15){
            $dprice = (int)$iprice/100*10;
           
            $newprice = $iprice-$dprice;
            $n_price = round($newprice);
        }else if($innum>=10){
            $dprice = (int)$iprice/100*5;
           
            $newprice = $iprice-$dprice;
            $n_price = round($newprice);
        }else if($innum>=5){
            $dprice = (int)$iprice/100*2;
           
            $newprice = $iprice-$dprice;
            $n_price = round($newprice);
        }else{
            $n_price=$iprice;
             
        }

        $item = $pr["title"];
        $amount = $n_price * $qty + (int)$delivery;
        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $address = $ar["line_1"] . "," . $ar["line_2"];
        $city = $cr["name"];

        $array['id'] = $orderID;
        $array['item'] = $item;
        $array['amount'] = $amount;
        $array['fname'] = $fname;
        $array['lname'] = $lname;
        $array['mobile'] = $mobile;
        $array['email'] = $uemail;
        $array['address'] = $address;
        $array['city'] = $city;

        echo json_encode($array);


    } else {
        echo "2";
    }
} else {
    echo "1";
}
