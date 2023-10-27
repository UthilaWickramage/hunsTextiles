<?php
require "connection.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $userrs = Database::select("SELECT * FROM `product` WHERE `id`='" . $id. "'");

    $num = $userrs->num_rows;

    if ($num == 1) {
        $row = $userrs->fetch_assoc();
        $us = $row["status_id"];

        if ($us == 1) {
            Database::uid("UPDATE `product` SET `status_id`='2' WHERE `id`='" . $id . "'");
            echo "success1";
        } else {
            Database::uid("UPDATE `product` SET `status_id`='1' WHERE `id`='" . $id . "'");
            echo "success2";
        }
    } else {
        echo "no such a user";
    }
}