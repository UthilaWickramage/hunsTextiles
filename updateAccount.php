<?php
require "config/connection.php";
$fname =  $_POST["fname"];
$lname =  $_POST["lname"];
$email =  $_POST["email"];
$mobile =  $_POST["mobile"];

if(empty($fname)){
    echo "first name cannot be empty";
}else if(empty($lname)){
    echo "last name cannot be empty";
}else if(empty($email)){
    echo "email cannot be empty";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "please enter a valid email address";
}else if(empty($mobile)){
    echo "mobile cannot be empty";
}else if(strlen($mobile)!=10){
echo "mobile should 10 characters long";
}else if(preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile)== 0){
    echo "invalid mobile number format";
}else{
    Database::uid("UPDATE user_details SET `fname`='".$fname."', `lname`='".$lname."', `email`='".$email."', `mobile`='".$mobile."' WHERE `user_id`=1 ");
echo "success";
}


?>