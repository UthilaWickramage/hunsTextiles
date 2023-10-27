<?php
require "connection.php";
$cid = $_POST["cid"];
$pageno = $_POST["page"];
$results_per_page = 3;

$products = Database::select("SELECT * FROM `product_details` WHERE `cid`='" . $cid . "';");

$pn = $products->num_rows;

$number_of_pages = ceil($pn / $results_per_page);


$page_first_result = ((int)$pageno - 1) * $results_per_page;
$selectedrs = Database::select("SELECT * FROM `product_details` WHERE `cid`='" . $cid . "' AND `status_id`=1 LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");

$srn = $selectedrs->num_rows;

for ($i = 0; $i < $srn; $i++) {
    $sr = $selectedrs->fetch_assoc();
?>
    <div class="col-9 offset-3 offset-lg-0 col-lg-4">
        <div class="box">
            
            <!--img-box---------->
            <div class="slide-img" style="height: 350px;">
                <img alt="1" src="<?php echo $sr["code"] ?>">
                <!--overlayer---------->
                <div class="overlay">
                    <!--buy-btn------>
                    <a href="<?php echo "singleProductView.php?pid=" . ($sr["pid"]); ?>"  class="buy-btn">Buy Now</a>
                </div>
            </div>
            <!--detail-box--------->
            <div class="detail-box" style="height: 100px;">
                <!--type-------->
                <div class="type">
                    <a href="#"><?php echo $sr["title"] ?></a>
                    <?php
                    $brs = Database::select("SELECT * FROM `brand` WHERE `id` = '" . $sr["bid"] . "'");
                    $bfr = $brs->fetch_assoc();
                    ?>
                    <span><?php echo $bfr["name"] ?></span>
                    <?php
                    if ($sr["qty"] == 0) {
                    ?>
                        <span class="card-text text-danger">Out of Stock</span>
                    <?php
                    } else {
                    ?>
                        <span class="card-text text-warning">In Stock</span>
                    <?php
                    }

                    ?>

                </div>
                <!--price-------->
                <a href="#" class="price">Rs. <?php echo $sr["price"] ?></a>

            </div>

        </div>
    </div>
<?php
}
?>
<div class="col-12 text-center">
<nav class="float-end mt-4" aria-label="Page navigation">
    <ul class="pagination">
        <?php
        if ($pageno != 1) {
        ?>
            <li class="page-item"><a class="page-link" onclick="productsGrid(<?php echo $pageno - 1 ?>, <?php echo $cid ?>)">Previous</a></li>
            <?php
        }

        for ($i = 1; $i <= $number_of_pages; $i++) {
            if ($i == $pageno) {
            ?>

                <li class="page-item active"><a class="page-link" onclick="productsGrid(<?php echo $i ?>,<?php echo $cid ?>)"><?php echo $i ?></a></li>

            <?php
            } else {
            ?>

                <li class="page-item"><a class="page-link" onclick="productsGrid(<?php echo $i ?>, <?php echo $cid ?>)"><?php echo $i ?></a></li>
            <?php
            }
        }


        if ($pageno != $number_of_pages) {
            ?>
            <li class="page-item"><a onclick="productsGrid(<?php echo $pageno + 1?>, <?php echo $cid ?>)" class="page-link">Next</a></li>
        <?php
        }
        ?>

    </ul>
</nav>
</div>