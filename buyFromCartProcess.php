<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {


    $uemail = $_SESSION["u"]["email"];

    $array;

    $orderID = uniqid();


    $total = "0";

    $addressrs = Database::select("SELECT * FROM `user_has_address` WHERE `user_email`='" . $uemail . "'");
    $an = $addressrs->num_rows;


    if ($an == 1) {
        $ar = $addressrs->fetch_assoc();

        $city_id = $ar["city_id"];

        $cityrs = Database::select("SELECT * FROM `city` WHERE `id`='" . $city_id . "'");
        $cr = $cityrs->fetch_assoc();

        $district_id = $cr["district_id"];

        $delivery = "0";


        $cartrs = Database::select("SELECT * FROM `cart` WHERE `user_email`='" . $uemail . "'");


        $cartnum = $cartrs->num_rows;
        if ($cartnum > 0) {
            $cqty = Database::select("SELECT SUM(`qty`) AS `sumqty` FROM `cart` WHERE `user_email`='" . $uemail . "'");
            $cf = $cqty->fetch_assoc();
            $qty = $cf["sumqty"];

            for ($i = 0; $i < $cartnum; $i++) {
                $cartr = $cartrs->fetch_assoc();

                $pror = Database::select("SELECT * FROM `product` WHERE `id`='" . $cartr["product_id"] . "'");
                $prorrow = $pror->fetch_assoc();
                if ($district_id == "1") {
                    $delivery = $delivery + $prorrow["deliver_fee_colombo"];
                } else {
                    $delivery = $delivery +  $prorrow["deliver_fee_outside_colombo"];
                }
                $irs = Database::select("SELECT * FROM `invoice` WHERE `user_email`='" . $uemail . "'");
                $irnum = $irs->num_rows;
                $itemprice  =  $prorrow["price"];
                if ($irnum >= 20) {
                    $dprice = (int)$itemprice / 100 * 15;
                    $newprice = $itemprice - $dprice;
                    $n_price = round($newprice);
                } else if ($irnum >= 15) {
                    $dprice = (int)$itemprice / 100 * 10;
                    $newprice = $itemprice - $dprice;
                    $n_price = round($newprice);
                } else if ($irnum >= 10) {
                    $dprice = (int)$itemprice / 100 * 5;
                    $newprice = $itemprice - $dprice;
                    $n_price = round($newprice);
                } else if ($irnum >= 5) {
                    $dprice = (int)$itemprice / 100 * 2;
                    $newprice = $itemprice - $dprice;
                    $n_price = round($newprice);
                } else{
                    $n_price = $itemprice;
                }
                $total = $total + ($n_price * $cartr["qty"]);
            }

            $item = $cartnum;
            $amount = $total +  (int)$delivery;
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
        }
    } else {
        echo "2";
    }
} else {
    echo "1";
}
