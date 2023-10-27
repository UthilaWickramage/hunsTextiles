<?php
require "connection.php";
$pageno = $_GET["page"];
$results_per_page = 10;


if (!empty($_GET["s"])) {
    $search = $_GET["s"];

    $products = Database::select("SELECT * FROM `invoice` WHERE `date` LIKE '%" . $search . "%' AND `status`='4'");
    $pn = $products->num_rows;

    $number_of_pages = ceil($pn / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $selectedrs = Database::select("SELECT * FROM `invoice` WHERE `date` LIKE '%" . $search . "%' AND `status`='4' ORDER BY `date` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
} else {
    $products = Database::select("SELECT * FROM `invoice` WHERE `status`='4'");
    $pn = $products->num_rows;

    $number_of_pages = ceil($pn / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $selectedrs = Database::select("SELECT * FROM `invoice` WHERE `status`='4' ORDER BY `date` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
}


$srn = $selectedrs->num_rows;

for ($i = 0; $i < $srn; $i++) {
    $sr = $selectedrs->fetch_assoc();

?>
    <article class="itemlist">
        <div class="row align-items-center">
            <div class="col-lg-2 col-8">
                <a class="itemside" href="#">
                    <div class="left">
                        <?php

                        ?>
                        <h6><?php echo $sr["order_id"] ?></h3>
                    </div>

                </a>
            </div>
            <div class="col-lg-2 text-center col-4"> <span>Rs.<?php echo $sr["total"] ?>.00</span> </div>
            <div class="col-lg-2 text-end col-sm-2 col-4 col-price"> <span><?php

                                                                            $datee = $sr["date"];
                                                                            $splitdt = explode(" ", $datee);
                                                                            echo $splitdt[0];

                                                                            ?></span> </div>
            <div class="col-lg-3 text-end col-sm-2 col-4 text-start"> <span><?php echo $sr["user_email"] ?></span> </div>

            <div class="col-lg-1 col-sm-2 col-4 text-end">
                <span style="cursor: pointer;" class="badge rounded-pill alert-success">Delivered</span>
            </div>
            <div class="col-lg-2 col-sm-2 col-4 text-end">

                <a class="btn btn-light" onclick="singleViewModalTransaction(<?php echo $sr['id'] ?>)">View</a>
            </div>

        </div> <!-- row .// -->
    </article> <!-- itemlist  .// -->
    <div class="modal fade" id="ViewTransactionModal<?php echo $sr["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $iirs = Database::select("SELECT * FROM `invoice_item` WHERE `invoice_id`='" . $sr["id"] . "'");
                    $iinum = $iirs->num_rows;

                    for ($d = 0; $d < $iinum; $d++) {
                        $iirow = $iirs->fetch_assoc();
                        $prors = Database::select("SELECT * FROM `product` WHERE `id`='" . $iirow["product_id"] . "'");
                        $prorow = $prors->fetch_assoc();
                        $pImage = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $prorow["id"] . "'");
                        $imgrow = $pImage->fetch_assoc();

                    ?>
                        <article class="itemlist">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-8">
                                    <a class="itemside" href="#">
                                        <div class="left">
                                            <?php

                                            ?>
                                            <img src="<?php echo $imgrow["code"] ?>" class="img-sm img-thumbnail" alt="">
                                        </div>

                                    </a>
                                </div>
                                <div class="col-lg-3 text-center col-4"> <?php echo $prorow["title"] ?> </div>
                                <div class="col-lg-1 text-end col-sm-2 col-4 col-price"><?php echo $iirow["qty"] ?></div>
                                <div class="col-lg-3 text-end col-sm-2 col-4 text-start"> <span>Rs. <?php echo $prorow["price"] ?>.00</div>

                                <div class="col-lg-1 col-sm-2 col-4 text-end">
                                    <span style="cursor: pointer;" class="badge rounded-pill alert-success">Delivered</span>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-4 text-end">

                                    
                                </div>

                            </div> <!-- row .// -->
                        </article> <!-- itemlist  .// -->
                       
                    <?php
                    }

                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>


<?php
}
?>

<nav class="float-end mt-4" aria-label="Page navigation">
    <ul class="pagination">
        <?php
        if ($pageno != 1) {
        ?>
            <li class="page-item"><a class="page-link" onclick="manageSales(<?php echo $pageno + 1 ?>)">Previous</a></li>
            <?php
        }

        for ($i = 1; $i <= $number_of_pages; $i++) {
            if ($i == $pageno) {
            ?>

                <li class="page-item active"><a class="page-link" onclick="manageSales(<?php echo $i ?>)"><?php echo $i ?></a></li>

            <?php
            } else {
            ?>

                <li class="page-item"><a class="page-link" onclick="manageSales(<?php echo $i ?>)"><?php echo $i ?></a></li>
            <?php
            }
        }


        if ($pageno != $number_of_pages) {
            ?>
            <li class="page-item"><a onclick="manageProducts(<?php echo $pageno + 1 ?>)" class="page-link">Next</a></li>
        <?php
        }
        ?>

    </ul>
</nav>