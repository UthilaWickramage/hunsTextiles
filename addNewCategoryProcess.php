<?php
session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {
    if (isset($_GET["cat"])) {
        $cat = $_GET["cat"];
        $ca = $_GET["ca"];

        $rs = Database::select("SELECT * FROM `sub_category` WHERE `name`='" . $cat . "'");
        $num = $rs->num_rows;
        
        
        if ($num == 0) {
            Database::select("INSERT INTO `sub_category` (`name`) VALUES ('" . $cat . "')");

            $lastId = Database::$connection->insert_id;

            Database::uid("INSERT INTO `sub_category_has_category` (`sub_category_id`,`category_id`) VALUES ('" . $lastId . "','" . $ca . "')");
            echo "1";
        } else {
            $row = $rs->fetch_assoc();
            $scrs = Database::select("SELECT * FROM `sub_category_has_category` WHERE `sub_category_id`='" . $row["id"] . "' AND `category_id`='" . $ca . "'");
            $scnum = $scrs->num_rows;

            if ($scnum == 0) {
                Database::uid("INSERT INTO `sub_category_has_category` (`sub_category_id`,`category_id`) VALUES ('" . $row["id"] . "','" . $ca . "')");
                echo "7";
            } else {
                echo "8";
            }
        }
    } else if (isset($_GET["color"])) {
        $color = $_GET["color"];
        $rs = Database::select("SELECT * FROM `color` WHERE `name`='" . $color . "'");
        if ($rs->num_rows > 0) {
            echo "2";
        } else {
            Database::select("INSERT INTO `color` (`name`) VALUES ('" . $color . "')");
            echo "4";
        }
    } else if (isset($_GET["br"])) {
        $br = $_GET["br"];

        $rs = Database::select("SELECT * FROM `brand` WHERE `name`='" . $br . "'");
        if ($rs->num_rows > 0) {
            echo "3";
        } else {
            Database::select("INSERT INTO `brand` (`name`) VALUES ('" . $br . "')");
            echo "6";
        }
    }
}
