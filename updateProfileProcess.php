<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    
    


    if (empty($fname)) {
        echo "first Name cannot be empty";
    } else if (empty($lname)) {
        echo "last Name cannot be empty";
    } else if (empty($mobile)) {
        echo "mobile cannot be empty";
    } else if (strlen($mobile) != 10) {
        echo "Mobile should be 10 characters long";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
        echo "invalid mobile number";
    } else {
        Database::uid("UPDATE `user` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "' WHERE `email`='" . $_SESSION["u"]["email"] . "'");

        $user = Database::select("SELECT * FROM `user` WHERE `email`='". $_SESSION["u"]["email"]."'");
        $usernum = $user->num_rows;

        if($usernum==1){
            $userrow = $user->fetch_assoc();

            $_SESSION["u"] = $userrow;
            echo "1";
        }
        
        
    }
} else {
    echo "please login to continue";
}
