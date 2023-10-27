<?php
require "connection.php";
$pageno = $_GET["page"];
$results_per_page = 10;


if (isset($_GET["s"])) {
    $search = $_GET["s"];

    $products = Database::select("SELECT * FROM `product` WHERE `title` LIKE '%" . $search . "%'");
    $pn = $products->num_rows;

    $number_of_pages = ceil($pn / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $selectedrs = Database::select("SELECT * FROM `product` WHERE `title` LIKE '%" . $search . "%' ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
} else {
    $products = Database::select("SELECT * FROM `product`");
    $pn = $products->num_rows;

    $number_of_pages = ceil($pn / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $selectedrs = Database::select("SELECT * FROM `product`  ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
}


$srn = $selectedrs->num_rows;

for ($i = 0; $i < $srn; $i++) {
    $sr = $selectedrs->fetch_assoc();

?>
    <article class="itemlist">
        <div class="row align-items-center">
            <div class="col-lg-3 col-8">
                <a class="itemside" href="#">
                    <div class="left">
                        <?php
                        $pImage = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $sr["id"] . "'");
                        $imgrow = $pImage->fetch_assoc();
                        ?>
                        <img src="<?php echo $imgrow["code"]; ?>" class="img-sm img-thumbnail" alt="Item">
                    </div>
                    <div class="info">
                        <h6 class="mb-0"><?php echo $sr["title"]; ?></h6>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 text-center col-4"> <span>Rs.<?php echo $sr["price"] ?>.00</span> </div>
            <div class="col-lg-1 text-end col-sm-2 col-4 col-price"> <span><?php echo $sr["qty"] ?></span> </div>

            <div class="col-lg-2 col-sm-2 col-4 col-status">
                <?php
                $s  = $sr["status_id"];

                if ($s == "1") {
                ?>
                    <span id="blockbtn<?php echo $sr['id'] ?>" style="cursor: pointer;" onclick="blockProduct('<?php echo $sr['id'] ?>')" class="badge rounded-pill alert-success">Active</span>
                <?php
                } else {
                ?>
                    <span id="blockbtn<?php echo $sr['id'] ?>" style="cursor: pointer;" onclick="blockProduct('<?php echo $sr['id'] ?>')" class="badge rounded-pill alert-danger">Deactive</span>
                <?php
                }
                ?>

            </div>
            <div class="col-lg-2 col-sm-2 col-4 col-date">
                <span><?php

                        $datee = $sr["datetime_added"];
                        $splitdt = explode(" ", $datee);
                        echo $splitdt[0];

                        ?></span>
            </div>
            <div class="col-lg-1 col-sm-2 col-4 col-action">
                <td><a class="text-dark fs-5 me-3" style="cursor: pointer " onclick="UpdateModal(<?php echo $sr['id'] ?>)"><i class="fas fa-pen"></i></a></td>&nbsp;
                <td><a class="text-danger fs-4" style="cursor: pointer " onclick="deleteModal(<?php echo $sr['id'] ?>)"><i class="bi bi-trash-fill"></i></a></td>

            </div>
            <div class="col-lg-1 col-sm-2 col-4 col-action">

                <td class="text-end">

                    <a class="btn btn-light" onclick="singleViewModal(<?php echo $sr['id'] ?>)">View</a>
                </td>
            </div>
        </div> <!-- row .// -->
    </article> <!-- itemlist  .// -->

    <div class="modal fade" id="asingleProductViewModal<?php echo $sr['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $sr["title"] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="<?php echo $imgrow["code"]; ?>" style="height:250px; " class="img-fluid" alt=""><br>
                    </div>

                    <span class="fs-5 fw-bold">Price :</span>&nbsp;
                    <span class="fs-6">Rs. <?php echo $sr["price"] ?>.00</span>&nbsp;<br>
                    <span class="fs-5 fw-bold">Quantity :</span>&nbsp;
                    <span class="fs-6"><?php echo $sr["qty"] ?> Items Left</span><br>
                    <span class="fs-5 fw-bold">Brand :</span>&nbsp;
                    <?php
                    $sellerrss = Database::select("SELECT * FROM `brand` WHERE `id`='" . $sr["brand_id"] . "'");
                    $sellerr = $sellerrss->fetch_assoc();
                    ?>
                    <span class="fs-6"><?php echo $sellerr["name"] ?></span><br>
                    <span class="fs-5 fw-bold">Description:</span>&nbsp;
                    <p><?php echo $sr["description"] ?></p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

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
                    <button type="button" class="btn btn-success text-white" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onclick="deleteproduct(<?php echo $sr['id']; ?>)">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal<?php echo $sr['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $sr["title"] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 mt-3">
                        <span class="form-label">Edit Product Title :</span>
                        <input type="text" class="form-control" id="utitle<?php echo $sr['id']?>" value="<?php echo $sr["title"] ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <span class="form-label">Edit Product Quantity :</span>
                        <input type="number" class="form-control" id="uqty<?php echo $sr['id']?>" value="<?php echo $sr["qty"] ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-12">
                            <span class="form-label">Edit Shipping Cost Colombo :</span>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" id="ucwc<?php echo $sr['id']?>" value="<?php echo $sr["deliver_fee_colombo"]?>" aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text">.00</span>
                                </div>

                            </div>
                            <div class="col-12">
                            <span class="form-label">Edit Shipping Cost Outside Colombo :</span>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" id="ucoc<?php echo $sr['id']?>" value="<?php echo $sr["deliver_fee_outside_colombo"]?>" aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                    <span class="form-label">Edit Product Description :</span>
                        <textarea class="form-control" cols="20" rows="5" id="udesc<?php echo $sr['id']?>"><?php echo $sr["description"] ?></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success text-white" onclick="updateProduct(<?php echo $sr['id']?>)">Save changes</button>
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
            <li class="page-item"><a class="page-link" onclick="manageProducts(<?php echo $pageno + 1 ?>)">Previous</a></li>
            <?php
        }

        for ($i = 1; $i <= $number_of_pages; $i++) {
            if ($i == $pageno) {
            ?>

                <li class="page-item active"><a class="page-link" onclick="manageProducts(<?php echo $i ?>)"><?php echo $i ?></a></li>

            <?php
            } else {
            ?>

                <li class="page-item"><a class="page-link" onclick="manageProducts(<?php echo $i ?>)"><?php echo $i ?></a></li>
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