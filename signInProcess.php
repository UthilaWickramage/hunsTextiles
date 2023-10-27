<?php
session_start();

require "connection.php";
$email = $_POST["email"];
$password = $_POST["password"];
$remember = $_POST["remember"];

$resultset = Database::select("SELECT * FROM user WHERE `email`='".$email."' AND `password`='".$password."'");
$n = $resultset->num_rows;


if($n==1){
   
   $d = $resultset->fetch_assoc();
   $s = $d["status_id"];
   if($s==1){
      $_SESSION["u"]=$d;

      if($remember=="true"){
         setcookie("user_name",$email,time()+(60*60*24*365));
         setcookie("password",$password,time()+(60*60*24*365));
      }else{
         setcookie("email","",-1);
         setcookie("password","",-1);
      }
      echo "success";
   }else{
      echo "You account is temporarily";
   }
   
}else{
   echo "Invalid Details";
}

?>