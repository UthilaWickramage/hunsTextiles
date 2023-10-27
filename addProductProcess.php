<?php
require "connection.php";
$category = $_POST["c"];
$brand = $_POST["b"];
$sub_category = $_POST["sc"];
$title = $_POST["t"];
$sku = $_POST["sku"];
$size = $_POST["size"];
$color = $_POST["col"];
$qty = (int)$_POST["qty"];
$price = (int)$_POST["pr"];
$cwc = (int)$_POST["dwc"];
$coc = (int)$_POST["doc"];
$desc = $_POST["d"];




$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;


if ($category == "0") {
    echo "Please select a category";
} else if ($sub_category == "0") {
    echo "Please select a brand";
} else if ($brand == "0") {
    echo "Please select a model";
} else if (empty($title)) {
    echo "please add a title";
} else if (strlen($title) > 100) {
    echo "Title must be less than 100 characters";
} else if (empty($qty)) {
    echo "Please add product quantity";
} else if (!is_int($qty)) {
    echo "please enter a valid quantity";
} else if (empty($sku)) {
    echo "product quantity should be more than one";
} else if ($qty < 0) {
    echo "product quantity should be more than one";
} else if (empty($price)) {
    echo "Add single unit price";
} else if (!is_int($price)) {
    echo "Add a valid unit price";
} else if (empty($cwc)) {
    echo "please add a delivery price within colombo";
} else if (!is_int($cwc)) {
    echo "please add a valid delivery price";
} else if (empty($coc)) {
    echo "Please add a delivery price outside colombo";
} else if (!is_int($coc)) {
    echo "Please add a valid delivery price";
} else if (empty($desc)) {
    echo "Please add a product description";
} else {
    $categoryHasSize = Database::select("SELECT `id` FROM `category_has_size` WHERE `category_id` = '" . $category . "' AND `size_id`='" . $size . "'");
    $s = $categoryHasSize->fetch_assoc();
    $categoryHasSizeId = $s["id"];

    $categoryHasSubCategory = Database::select("SELECT `id` FROM `sub_category_has_category` WHERE `category_id` = '" . $category . "' AND `sub_category_id`='" . $sub_category . "'");
    $f = $categoryHasSubCategory->fetch_assoc();
    $categoryHasSubCategoryId = $f["id"];

    Database::uid("INSERT INTO `product`(`sub_category_has_category_id`,`title`,`color_id`,`price`,`qty`,`description`,`sku`,`status_id`,
                    `datetime_added`,`deliver_fee_colombo`,`deliver_fee_outside_colombo`,`brand_id`,`category_has_size_id`) VALUES ('" . $categoryHasSubCategoryId . "','" . $title . "',
                    '" . $color . "','" . $price . "','" . $qty . "','" . $desc . "','" . $sku . "','" . $state . "','" . $date . "','" . $cwc . "','" . $coc . "','".$brand."','".$categoryHasSizeId."')");
    

    $lastId = Database::$connection->insert_id;


    $allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg");
    

    if (isset($_FILES["img"])) {
        $imgFile = $_FILES["img"];
        $file_extension = $imgFile["type"];
        if (!in_array($file_extension, $allowed_image_extensions)) {
            echo "Accepts jpg,jpeg,png or svg only";
        } else {


            $fileName = "resources//products//" . uniqid() . ".png";
            move_uploaded_file($imgFile["tmp_name"], $fileName);

            Database::uid("INSERT INTO `images`(`code`,`product_id`) VALUES ('" . $fileName . "','" . $lastId . "')");

            echo "1";
        }
    } else {
        echo "Please select an product image";
    }
}
