<?php
session_start();
require "connection.php";
if(isset($_SESSION["e"])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];
    $gender = $_POST["gender"];
    $evc = $_POST["evc"];
    $session_evc = $_SESSION["e"];
    
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    
    if($session_evc !=$evc){
    echo "Invalid Verification Code";
    }
    else if(empty($fname)){
    echo "Please enter your first name";
    }else if(strlen($fname)>50){
        echo "first name is too long";
    }else if(empty($lname)){
    echo "Please enter your last name";
    }else if(strlen($lname)>50){
        echo "last name is too long";
    }else if(empty($email)){
        echo "Please enter your email address";
    }else if(strlen($email)>50){
        echo "email is too long";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo  "enter a valid email address";
    }else if(empty($password)){
        echo "Please enter your password";
    }else if(strlen($password)>20){
        echo "password is too long";
    }else if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase ){
    echo "Your password is not strong enough";
    }else if(empty($mobile)){
    echo "Please enter your mobile number";
    }else if(strlen($mobile)!=10){
    echo "Mobile should be 10 characters long";
    }else if(preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/",$mobile)==0){
        echo "invalid mobile number";
    }else{
        $r = Database::select("SELECT * FROM `gender` WHERE `id`='".$gender."'");
        if($r->num_rows==0){
            echo "There's no such a gender";
        }else{
            $r = Database::select("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."';");
            if($r->num_rows>0){
                echo "this email address is already registered";
            }else{
               $d = new DateTime();
               $tz = new DateTimeZone("Asia/Colombo");
               $d->setTimeZone($tz);
               $date = $d->format("Y-m-d H:i:s");
                // date_default_timezone_set("Asia/Colombo");
                // $date =  date("Y-m-d H:i:s");
    
                $status=1;
    
                Database::uid("INSERT INTO `user`(`email`,`fname`,`lname`,`password`,`mobile`,`register_date`,`gender_id`,status_id) VALUES ('".$email."','".$fname."','".$lname."','".$password."','".$mobile."','".$date."','".$gender."','".$status."');");
                    
               
                    echo "1";
                
            }
        }
    }
    
    
}else{
echo "No session";
}

