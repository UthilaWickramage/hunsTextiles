<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $no = $_POST["n"];
    $l1 = $_POST["l1"];
    $l2 = $_POST["l2"];
    $city = $_POST["c"];

    $addressrs = Database::select("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
        $nr = $addressrs->num_rows;

        if ($nr == 1) {
            Database::uid("UPDATE `user_has_address` SET `no`='" . $no . "',`line_1`='" . $l1 . "',`line_2`='" . $l2 . "',`city_id`='" . $city . "' WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
            
            echo "1";
        } else {


            Database::uid("INSERT INTO `user_has_address` (`user_email`,`no`,`line_1`,`line_2`,`city_id`) VALUES ('" . $_SESSION["u"]["email"] . "','" . $no . "','" . $l1 . "','" . $l2 . "','" . $city . "')");
           
        }
}else{
    echo "sign in first";
}
