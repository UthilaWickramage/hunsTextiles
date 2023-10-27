<?php
session_start();
require "connection.php";
if (isset($_GET["vc"])) {
    $v = $_GET["vc"];
    $adminrs = Database::select("SELECT * FROM `admin` WHERE `verification_code`='" . $v . "'");
    $an = $adminrs->num_rows;

    if ($an == 1) {
        $ar = $adminrs->fetch_assoc();

        $_SESSION["admin"] = $ar;

        echo "success";
    } else {
       
    }
} else {
    echo "please enter the verification code";
}
