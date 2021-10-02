<?php
require "./config/connection.php";

$e = $_POST["e"];
$np = $_POST["np"];
$cnp = $_POST["cnp"];
$vc = $_POST["vc"];

if(empty($e)){
    echo "please enter your email address";
 }else if(empty($np)){
    echo "please enter your new password";
 }else if(strlen($np)>20){
    echo "password is too long";
 }else if(empty($cnp)){
    echo "please confirm your new password";
 }else if($np!=$cnp){
    echo "new password and confirm password doesn't match";
 }else if(empty($vc)){
    echo "please enter the verification code";
 }else{
     $r = Database::select("SELECT * FROM `user_details` WHERE `email`='".$e."'");
     if($r->num_rows==1){
         Database::uid("UPDATE `user_details` SET `password`='".$np."' WHERE `email`='".$e."'");
         echo "success";
     }else{
         echo "Invalid Email Address";
     }
 }


?>