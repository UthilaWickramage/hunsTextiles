<?php
session_start();
require "./config/connection.php";
$email = $_POST["email"];
$password = $_POST["password"];
$remember = $_POST["remember"];

$r = Database::select("SELECT * FROM user_details WHERE `email`='".$email."' AND `password`='".$password."'");
$n = $r->num_rows;

if($n==1){
    echo "1";
    $d = $r->fetch_assoc();
    $_SESSION["user"]=$d;

    if($remember=="true"){
        setcookie("_em",$email,time()+(60*60*24*365));
        setcookie("_pd",$password,time()+(60*60*24*365));
    }else{
        setcookie("_em","",-1);
        setcookie("_pd","",-1);
    }
}else{
    echo "Invalid Email or Password";
}


?>