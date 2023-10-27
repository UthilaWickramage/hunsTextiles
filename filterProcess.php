<?php
session_start();
$user = $_SESSION["u"];

require "connection.php";

$search = $_POST["s"];
$age = $_POST["a"];
$qty = $_POST["q"];
$condition = $_POST["c"];
$results_per_page = 6;
$pageno = $_POST["page"];


if (!empty($search) && $age != 0) {
    if ($age == 1) {
        $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `title` LIKE '%" . $search . "%'");
        $pn = $products->num_rows;

        $number_of_pages = ceil($pn / $results_per_page);


        $page_first_result = ((int)$pageno-1) * $results_per_page;
        $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' AND `title` LIKE '%" . $search . "%' ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    }
    if ($age == 2) {
        $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `title` LIKE '%" . $search . "%'");
        $pn = $products->num_rows;

        $number_of_pages = ceil($pn / $results_per_page);


        $page_first_result = ((int)$pageno-1) * $results_per_page;
        $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' AND `title` LIKE '%" . $search . "%' ORDER BY `datetime_added` ASC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    }
} else if (!empty($search) && $qty != 0) {
    if ($qty == 1) {
        $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `title` LIKE '%" . $search . "%'");
        $pn = $products->num_rows;

        $number_of_pages = ceil($pn / $results_per_page);


        $page_first_result = ((int)$pageno - 1) * $results_per_page;
        $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' AND `title` LIKE '%" . $search . "%' ORDER BY `qty` ASC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    }
    if ($qty == 2) {
        $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `title` LIKE '%" . $search . "%'");
        $pn = $products->num_rows;

        $number_of_pages = ceil($pn / $results_per_page);


        $page_first_result = ((int)$pageno - 1) * $results_per_page;
        $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' AND `title` LIKE '%" . $search . "%' ORDER BY `qty` ASC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    }
} else if (!empty($search) && $condition != 0) {
    $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `title` LIKE '%" . $search . "%' AND `condition_id`='" . $condition . "'");
    $pn = $products->num_rows;

    $number_of_pages = ceil($pn / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' AND `title` LIKE '%" . $search . "%' AND `condition_id`='" . $condition . "'  LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
} else if (!empty($search)) {
    $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `title` LIKE '%" . $search . "%'");
    $pn = $products->num_rows;

    $number_of_pages = ceil($pn / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' AND `title` LIKE '%" . $search . "%' ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
} else if ($age != 0) {
    if ($age == "1") {
        $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'");
        $pn = $products->num_rows;

        $number_of_pages = ceil($pn / $results_per_page);


        $page_first_result = ((int)$pageno - 1) * $results_per_page;
        $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    } else if ($age == "2") {
        $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'");
        $pn = $products->num_rows;

        $number_of_pages = ceil($pn / $results_per_page);


        $page_first_result = ((int)$pageno - 1) * $results_per_page;
        $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' ORDER BY `datetime_added` ASC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    }
} else if ($qty != 0) {
    if ($qty == 1) {
        $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'");
        $pn = $products->num_rows;

        $number_of_pages = ceil($pn / $results_per_page);


        $page_first_result = ((int)$pageno - 1) * $results_per_page;
        $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' ORDER BY `qty` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    } else if ($qty == 2) {
        $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'");
        $pn = $products->num_rows;

        $number_of_pages = ceil($pn / $results_per_page);


        $page_first_result = ((int)$pageno - 1) * $results_per_page;
        $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' ORDER BY `qty` ASC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    }
} else if ($condition != 0) {
    $products = Database::select("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' AND `condition_id`='" . $condition . "'");
    $pn = $products->num_rows;

    $number_of_pages = ceil($pn / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $selectedrs = Database::select("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' AND `condition_id`='" . $condition . "' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
}



$srn = $selectedrs->num_rows;

for ($i = 0; $i < $srn; $i++) {
    $sr = $selectedrs->fetch_assoc();
?>

    <div class="col-12 col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">

                <?php
                $pimgrs = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $sr["id"] . "'");
                $pir = $pimgrs->fetch_assoc();



                ?>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="<?php echo $pir["code"] ?>" class="img-fluid rounded-start" style="max-height:100px;" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $sr["title"] ?></h5>
                        <span class="card-text text-primary fw-bold">Rs. <?php echo $sr["price"] ?></span>
                        <p class="card-text text-success fw-bold"><?php echo $sr["qty"] ?> Items Left</p>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="check" onchange="changeStatus(<?php echo $sr['id']; ?>)" <?php

                                                                                                                                                        if ($sr["status_id"] == 2) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        }
                                                                                                                                                        ?>>
                            <label class="form-check-label text-info fw-bold" id="checklabel<?php echo $sr["id"] ?>">
                                <?php

                                if ($sr["status_id"] == 2) {
                                    echo "Make your product Active";
                                } else {
                                    echo "Make your product Deactive";
                                }
                                ?>
                            </label>
                        </div>
                        <div class="mt-1">
                            <a href="#" class="btn btn-sm btn-success" onclick="sendId(<?php echo $sr['id']; ?>)">Update Product</a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteModal(<?php echo $sr['id']; ?>)">Delete Product</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal<?php echo $sr['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onclick="deleteproduct(<?php echo $sr['id']; ?>)">Yes</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<div class="row">
    <div class="col-12 mt-4 mb-4 d-flex justify-content-center">
        <div class="pagination">

            <?php
            if ($pageno != 1) {
            ?>
                <a class="active ms-1" onclick="addFilters(<?php echo $pageno - 1 ?>)">&raquo;</a>
            <?php

            }
            ?>


            <?php
            for ($i = 1; $i <= $number_of_pages; $i++) {
                if ($i == $pageno) {
            ?>
                    <a class="active ms-1" onclick="addFilters(<?php echo $i ?>)"><?php echo $i ?></a>

                <?php
                } else {
                ?>
                    <a class="ms-1" onclick="addFilters(<?php echo $i; ?>)"><?php echo $i ?></a>

            <?php
                }
            }

            ?>

             <?php
                                    if ($pageno != $number_of_pages) {
                                    ?> <a class="active ms-1" onclick="addFilters(<?php echo $pageno + 1 ?>)">&raquo;</a>
        <?php
                                    }
        ?>
        </div>
    </div>
</div>