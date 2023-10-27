<?php
require "connection.php";
$pageno = $_GET["page"];
$results_per_page = 6;




$products = Database::select("SELECT * FROM `comments`");
$pn = $products->num_rows;

$number_of_pages = ceil($pn / $results_per_page);


$page_first_result = ((int)$pageno - 1) * $results_per_page;
$selectedrs = Database::select("SELECT * FROM `comments`  ORDER BY `time_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");



$srn = $selectedrs->num_rows;

for ($i = 0; $i < $srn; $i++) {
    $sr = $selectedrs->fetch_assoc();

    $prors = Database::select("SELECT * FROM `product` WHERE `id`='" . $sr["product_id"] . "'");
    $prorow = $prors->fetch_assoc();

    $imgrs = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $sr["product_id"] . "'");
    $imgrow = $imgrs->fetch_assoc();

    $cusrs = Database::select("SELECT * FROM `user` WHERE `email`='" . $sr["user_email"] . "'");
    $cusnum = $cusrs->fetch_assoc();

?>
    <article class="itemlist">
        <div class="row align-items-center">
           
            <div class="col-lg-2 col-sm-2 col-4 col-date">
                <h6><?php echo $cusnum["fname"] . " " . $cusnum["lname"] ?></h6>

            </div>
            <div class="col-lg-3 col-sm-2 col-4 col-date">
                <h6><?php echo $cusnum["email"] ?></h6>

            </div>

            <div class="col-lg-2 col-sm-2 col-4 col-date">
            <img src="<?php echo $imgrow["code"]?>"  class="img-sm img-thumbnail" alt="">

            </div>

            <div class="col-lg-2 col-sm-2 col-4 text-start">
                <h6><?php echo $prorow["title"] ?></h6>
            </div>
            <div class="col-lg-2 col-sm-2 col-4 col-date">
                <span><?php

                        echo  $sr["time_added"];


                        ?></span>
            </div>
            <div class="col-lg-1 col-sm-2 col-4 col-action">
                <td class="text-end">
                    <a class="btn btn-light" onclick="replyCommentModal(<?php echo $sr['id'] ?>)">Reply</a>
                </td>
            </div>
        </div> <!-- row .// -->
    </article> <!-- itemlist  .// -->
    <?php

   
    ?>
        <div class="modal fade" id="areplyCommentModal<?php echo $sr['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $prorow["title"] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-12 mt-2">
                                <span class="form-label">Customer Email:</span>
                                <span class="form-label fw-bold"><?php echo $sr["user_email"] ?></span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="form-label">Product:</span>
                                <span class="form-label fw-bold"><?php echo $prorow["title"] ?></span>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="form-label">Comment:</span>
                                <textarea class="form-control fw-bold"><?php echo $sr["content"] ?></textarea>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="form-label">Reply:</span>
                                <textarea class="form-control fw-bold" id="replytext<?php echo $sr["id"]?>"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveReply(<?php echo $sr['id']?>)">Reply</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    // }
    ?>

<?php
}
?>

<nav class="float-end mt-4" aria-label="Page navigation">
    <ul class="pagination">
        <?php
        if ($pageno != 1) {
        ?>
            <li class="page-item"><a class="page-link" onclick="bringComments(<?php echo $pageno + 1 ?>)">Previous</a></li>
            <?php
        }

        for ($i = 1; $i <= $number_of_pages; $i++) {
            if ($i == $pageno) {
            ?>

                <li class="page-item active"><a class="page-link" onclick="bringComments(<?php echo $i ?>)"><?php echo $i ?></a></li>

            <?php
            } else {
            ?>

                <li class="page-item"><a class="page-link" onclick="bringComments(<?php echo $i ?>)"><?php echo $i ?></a></li>
            <?php
            }
        }


        if ($pageno != $number_of_pages) {
            ?>
            <li class="page-item"><a onclick="bringComments(<?php echo $pageno + 1 ?>)" class="page-link">Next</a></li>
        <?php
        }
        ?>

    </ul>
</nav>