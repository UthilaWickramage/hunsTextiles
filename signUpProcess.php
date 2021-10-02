<?php
require "./config/connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];
$check = $_POST["check"];

$number = preg_match('#[0-9]+#', $password);
$uppercase = preg_match('#[A-Z]+#', $password);
$lowercase = preg_match('#[a-z]+#', $password);
$specialChars = preg_match("/[\/'^£$%&*()}{@#~?><>,|=_+¬-]/", $password);

if(empty($fname)){
    echo 1;
}else if(strlen($fname)>20){
    echo 2;
}else if(empty($lname)){
    echo 3;
}else if(strlen($lname)>20){
    echo 4;
}else if(empty($email)){
    echo 5;
}else if(strlen($email)>50){
    echo 6;
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo 7;
}else if(empty($password)){
    echo 8;
}else if(strlen($password)>20){
    echo 9;
}else if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars){
    echo 10;
}else if(empty($mobile)){
    echo 11;
}else if(strlen($mobile)!=10){
    echo 12;
}else if(preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0){
 echo 13;
}else if(!isset($check)){
echo 14;
}else{
    $r = Database::select("SELECT * FROM `gender` WHERE `id`='".$gender."';");
    if($r->num_rows==0){
        echo "there's no such a gender";
    }else{
        $r = Database::select("SELECT * FROM `user_details` WHERE `email`='".$email."';");
        if($r->num_rows>0){
            echo "A user with the same email already exists";
        }else{
            date_default_timezone_set("Asia/Colombo");
            $date =  date("Y-m-d H:i:s");
            $status = 0;
            Database::uid("INSERT INTO `user_details`(`email`,`fname`,`lname`,`mobile`,`password`,`register_date`,`status`,`gender_id`) VALUES ('".$email."','".$fname."','".$lname."','".$mobile."','".$password."','".$date."','".$status."','".$gender."');");
            echo "ok";
        }
    }
}
?>