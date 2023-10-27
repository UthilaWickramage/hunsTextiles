<?php
require "connection.php";

$wid = $_GET["id"];

$watchrs = Database::select("SELECT * FROM `watchlist` WHERE `id`='".$wid."'");
$wn = $watchrs->num_rows;
if($wn==1){
$watchrow = $watchrs->fetch_assoc();

$pid = (int)$watchrow["product_id"];
$mail = $watchrow["user_email"];

 Database::uid("INSERT INTO recent (`product_id`,`user_email`) VALUES ('".$pid."','".$mail."')");

 Database::uid("DELETE FROM `watchlist` WHERE `id`='".$wid."'");
 echo "success";
}
