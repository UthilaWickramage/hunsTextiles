<?php
$sc = uniqid();
if(!isset($_COOKIE["subscribe_user"])){
    if(isset($_COOKIE["s_m"])){
    
      
    }else{
        setcookie("s_m",$sc,time()+(60*60*24));
        echo "1";
    }
}


?>