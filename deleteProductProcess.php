<?php
require "connection.php";
$id = $_GET["id"];

$product = Database::select("SELECT * FROM `product` WHERE `id`='".$id."'");
$pn = $product->num_rows;

if($pn==1){
    
    Database::uid("DELETE FROM `images` WHERE `product_id`='".$id."'");
    

    Database::uid("DELETE FROM `product` WHERE `id`='".$id."'");
    
echo "success";
}else{
    echo "Product Does Not Exist";
}

?>