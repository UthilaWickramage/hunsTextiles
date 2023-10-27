<?php
require "connection.php";
$pageno = $_GET["page"];
$results_per_page = 6;


if (isset($_GET["s"])) {
    $search = $_GET["s"];

    $products = Database::select("SELECT * FROM `user` WHERE `email` LIKE '%" . $search . "%'");
    $pn = $products->num_rows;

    $number_of_pages = ceil($pn / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $selectedrs = Database::select("SELECT * FROM `user` WHERE `email` LIKE '%" . $search . "%' ORDER BY `register_date` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
} else {
    $products = Database::select("SELECT * FROM `user`");
    $pn = $products->num_rows;

    $number_of_pages = ceil($pn / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $selectedrs = Database::select("SELECT * FROM `user`  ORDER BY `register_date` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
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
                        <span class="fw-bold"><?php echo $sr["fname"] . " " .  $sr["lname"] ?></span>
                        <?php
                        $invoicers = Database::select("SELECT * FROM `invoice` WHERE `user_email`='" . $sr["email"] . "'");
                        $innum = $invoicers->num_rows;
                        if ($innum >= 20) {
                        ?>
                            <span class="badge rounded-pill alert-warning" style="background-color: grey; color: black;">Platinum User</span>
                        <?php
                        }else if($innum >= 15){
                            ?>
                            <span class="badge rounded-pill alert-warning" style="background-color: gold; color: brown;">Gold User</span>
                        <?php
                        }else if($innum >= 10){
                            ?>
                            <span class="badge rounded-pill alert-warning" style="background-color: silver; color: black;">Silver User</span>
                        <?php
                        }else if($innum >= 5){
                            ?>
                            <span class="badge rounded-pill alert-warning" style="background-color: brown; color: whitesmoke;">Bronze User</span>
                        <?php
                        }
                        ?>

                    </div>


                </a>
            </div>
            <div class="col-lg-3 text-center col-4"> <span><?php echo $sr["email"] ?></span> </div>
            <div class="col-lg-2 text-end col-sm-2 col-4"><span class="mb-0"><?php echo $sr["mobile"]; ?></span> </div>

            <div class="col-lg-1 col-sm-2 col-4 col-status">
                <?php
                $s  = $sr["status_id"];

                if ($s == "1") {
                ?>
                    <span id="blockbtn<?php echo $sr['email'] ?>" style="cursor: pointer;" onclick="blockUser('<?php echo $sr['email'] ?>')" class="badge rounded-pill alert-success">Active</span>
                <?php
                } else {
                ?>
                    <span id="blockbtn<?php echo $sr['email'] ?>" style="cursor: pointer;" onclick="blockUser('<?php echo $sr['email'] ?>')" class="badge rounded-pill alert-danger">Deactive</span>
                <?php
                }
                ?>

            </div>
            <div class="col-lg-2 col-sm-2 col-4 col-date">
                <span><?php

                        $datee = $sr["register_date"];
                        $splitdt = explode(" ", $datee);
                        echo $splitdt[0];

                        ?></span>
            </div>
            <div class="col-lg-1 col-sm-2 col-4 col-action">
                <td class="text-end">
                    <a class="btn btn-light" onclick="ChatModal('<?php echo $sr['email'] ?>'); refreshMessages('<?php echo $sr['email'] ?>'); refreshChatBox('<?php echo $sr['email'] ?>')">Contact</a>
                </td>
            </div>
        </div> <!-- row .// -->
    </article> <!-- itemlist  .// -->
    <div class="modal fade" id="chatModal<?php echo $sr['email']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chat With <?php echo $sr['fname'] . " " . $sr["lname"] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 bg-white" style="height: 400px; overflow-y: scroll;">
                            <div class="row" id="ChatBox<?php echo $sr["email"]?>">
                                

                            </div>
                        </div>

                        <div class="input-group">
                            <input type="text" id="msgtext<?php echo $sr["email"]?>" placeholder="type your message..." aria-describedby="send-btn" class="form-control rounded-0 border border-1 border-danger py-4 bg-light">
                            <button id="send-btn" class="btn btn-danger" onclick="sendMessageToUser('<?php echo $sr['email'] ?>') "><i class="fas fa-paper-plane"></i></button>
                        </div>

                        <div class="col-12 d-grid mt-3">
                            <button class="btn btn-danger" onclick="ContactUserViaEmail('<?php echo $sr['email'] ?>')">Send this Message as an Email</button>
                        </div>
                        
                    </div>
                </div>
               
            </div>
        </div>
    </div>
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
<?php
}
?>

<nav class="float-end mt-4" aria-label="Page navigation">
    <ul class="pagination">
        <?php
        if ($pageno != 1) {
        ?>
            <li class="page-item"><a class="page-link" onclick="manageUsers(<?php echo $pageno + 1 ?>)">Previous</a></li>
            <?php
        }

        for ($i = 1; $i <= $number_of_pages; $i++) {
            if ($i == $pageno) {
            ?>

                <li class="page-item active"><a class="page-link" onclick="manageUsers(<?php echo $i ?>)"><?php echo $i ?></a></li>

            <?php
            } else {
            ?>

                <li class="page-item"><a class="page-link" onclick="manageUsers(<?php echo $i ?>)"><?php echo $i ?></a></li>
            <?php
            }
        }


        if ($pageno != $number_of_pages) {
            ?>
            <li class="page-item"><a onclick="manageUsers(<?php echo $pageno + 1 ?>)" class="page-link">Next</a></li>
        <?php
        }
        ?>

    </ul>
</nav>