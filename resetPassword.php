<?php
require "connection.php";
$email = $_POST["email"];
$np = $_POST["np"];
$rnp = $_POST["rnp"];
$vc = $_POST["vc"];



if(empty($email)){
   echo "please enter your email address";
}else if(empty($np)){
   echo "please enter your new password";
}else if(strlen($np)>20){
   echo "password is too long";
}else if(empty($rnp)){
   echo "please confirm your new password";
}else if($np!=$rnp){
   echo "new password and confirm password doesn't match";
}else if(empty($vc)){
   echo "please enter the verification code";
}else{
   $r = Database::select("SELECT * FROM `user` WHERE `email`='".$email."'");
   if($r->num_rows==1){
      Database::uid("UPDATE `user` SET `password`='".$np."' WHERE `email`='".$email."'");
      echo "success";
   }else{
      echo "invalid email address";
   }
}

?>