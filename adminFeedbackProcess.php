<?php
require "connection.php";
$pageno = $_GET["page"];
$results_per_page = 6;




$products = Database::select("SELECT * FROM `feedback`");
$pn = $products->num_rows;

$number_of_pages = ceil($pn / $results_per_page);


$page_first_result = ((int)$pageno - 1) * $results_per_page;
$selectedrs = Database::select("SELECT * FROM `feedback`  ORDER BY `date_time` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");



$srn = $selectedrs->num_rows;

for ($i = 0; $i < $srn; $i++) {
    $sr = $selectedrs->fetch_assoc();

    $prors = Database::select("SELECT * FROM `product` WHERE `id`='" . $sr["product_id"] . "'");
    $prorow = $prors->fetch_assoc();

    $imgrs = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $sr["product_id"] . "'");
    $imgrow = $imgrs->fetch_assoc();

?>
    <article class="itemlist">
        <div class="row align-items-center">
            <div class="col-lg-3 col-8">
                <a class="itemside" href="#">
                    <div class="left">
                        <h6><?php echo $prorow["id"] ?></h6>

                    </div>
                    <div class="center ms-3">
                        <img src="<?php echo $imgrow["code"] ?>" class="img-sm img-thumbnail" alt="">

                    </div>
                    <div class="info">
                        <h6><?php echo $prorow["title"] ?></h6>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 text-center col-4"> <span><?php echo $sr["user_email"] ?></span> </div>



            <div class="col-lg-2 col-sm-2 col-4 col-date">
                <span><?php

                        echo  $sr["date_time"];


                        ?></span>
            </div>
            <div class="col-lg-2 col-sm-2 col-4 col-action">
                <?php
                $rating = $sr["rating"];
                
                
                for ($s = 0; $s < 5; $s++) {
                    if($s<$rating){
                        ?>
                        <span class="fas fa-star text-warning"></span>
                    <?php
                    }else{
                        ?>
                        <span class="fas fa-star" style="color: #cfcfcf;"></span>
                    <?php
                    }
                
                }
                ?>
            </div>
            <div class="col-lg-2 col-sm-2 col-4 col-action">
                <td class="text-end">
                    <a class="btn btn-light" onclick="fullFeedbackModal(<?php echo $sr['id'] ?>)">View Feedback</a>
                </td>
            </div>
        </div> <!-- row .// -->
    </article> <!-- itemlist  .// -->

    <div class="modal fade" id="afullFeedbackModal<?php echo $sr['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $prorow["title"] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $cusrs = Database::select("SELECT * FROM `user` WHERE `email`='" . $sr["user_email"] . "'");
                    $cusnum = $cusrs->fetch_assoc();
                    ?>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <span class="form-label">Customer :</span>
                            <span class="form-label fw-bold"><?php echo $cusnum["fname"] . " " . $cusnum["lname"] ?></span>
                        </div>
                        <div class="col-12 mt-2">
                            <span class="form-label">Customer Email:</span>
                            <span class="form-label fw-bold"><?php echo $cusnum["email"] ?></span>
                        </div>
                        <div class="col-12 mt-2">
                            <span class="form-label">Product:</span>
                            <span class="form-label fw-bold"><?php echo $prorow["title"] ?></span>
                        </div>
                        <div class="col-12 mt-2">
                            <span class="form-label">Feedback:</span>
                            <textarea class="form-control fw-bold"><?php echo $sr["feed"] ?></textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
            <li class="page-item"><a class="page-link" onclick="bringFeedback(<?php echo $pageno + 1 ?>)">Previous</a></li>
            <?php
        }

        for ($i = 1; $i <= $number_of_pages; $i++) {
            if ($i == $pageno) {
            ?>

                <li class="page-item active"><a class="page-link" onclick="bringFeedback(<?php echo $i ?>)"><?php echo $i ?></a></li>

            <?php
            } else {
            ?>

                <li class="page-item"><a class="page-link" onclick="bringFeedback(<?php echo $i ?>)"><?php echo $i ?></a></li>
            <?php
            }
        }


        if ($pageno != $number_of_pages) {
            ?>
            <li class="page-item"><a onclick="bringFeedback(<?php echo $pageno + 1 ?>)" class="page-link">Next</a></li>
        <?php
        }
        ?>

    </ul>
</nav>