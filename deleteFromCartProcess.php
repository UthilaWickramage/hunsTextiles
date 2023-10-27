<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];
    $cid = $_GET["id"];

    $cartrs = Database::select("SELECT * FROM `cart` WHERE `id`='" . $cid . "'");
    $cn = $cartrs->num_rows;

    if ($cn == 1) {
        $cr = $cartrs->fetch_assoc();

            Database::uid("DELETE FROM `cart` WHERE `id`='" . $cid . "'");
            echo "success";
        
    }
}
