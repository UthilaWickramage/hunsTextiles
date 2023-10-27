<?php
session_start();

require "connection.php";
if (isset($_SESSION["u"])) {
    $uemail = $_SESSION["u"]["email"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Account</title>
        <link rel="icon" href="./resources/logo.svg">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="ui.css">
        <style>
            .star-widget label {
                font-size: 40px;
                color: #444;
                float: right;
                margin-right: 10px;
                transition: all 0.2s ease;
            }

            input:not(:checked)~label:hover,
            input:not(:checked)~label:hover~label {
                color: #fd4;
            }

            input:checked~label {
                color: #fd4;
            }
        </style>
    </head>

    <body style="overflow-x: hidden;" onload="refreshChatBox('<?php echo $uemail ?>'); refreshMessages('<?php echo $uemail ?>')">
        <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
        <?php

        require "./components/header.php";

        ?>
        <div class="container mt-3" id="productDetails">
            <div class="row mb-3">
                <div class="col-10 offset-1">
                    <div class="row">
                        <div class="col-12 col-md-4 d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                <div class="text-center">
                                    <span class="display-1 text-black-50" class=""> <i class="fas fa-user"></i></span>
                                </div>
                                <div class="card-body text-center">
                                    <span class="card-text fw-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="alert alert-warning text-center text-uppercase"><i class="fas fa-tags"></i>&nbsp;Earn unbelievable discounts by increasing your status</div>
                            </div>
                            <?php
                            $purchasebar = Database::select("SELECT * FROM `invoice` WHERE `user_email`='" . $uemail . "' AND `status`=4");
                            $purchasenum = $purchasebar->num_rows;
                            if ($purchasenum > 20) {
                            ?>
                                <div class="row">
                                    <div class="col-1">
                                        <img src="./resources/platinum.png" height="60" alt="">
                                    </div>
                                    <div class="col-9 ">
                                    <div class="row">
                                            <div class="col-12">
                                            <div class="progress">
                                            <div class="progress-bar progress-bar-striped  progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%; background-color: #CD7F32;">
                                            </div>  
                                        </div>
                                            </div>
                                            <div class="col-12 text-end">
                                            <span class="text-black-50 ms-2 fw-bold text-end"><?php echo $progress?>/100</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-1">
                                        <!-- <img src="./resources/platinum.png" height="60" alt=""> -->
                                       
                                    </div>
                                </div>
                            <?php
                            } else if ($purchasenum >= 15) {
                            ?>
                                <div class="row mt-5">
                                    <div class="col-1">
                                        <img src="./resources/gold.png" height="60" alt="">
                                    </div>
                                    <div class="col-9 mt-3">
                                        <?php
                                        $progress = ($purchasenum - 15) * 20;

                                        ?>
                                        <div class="row">
                                            <div class="col-12">
                                            <div class="progress">
                                            <div class="progress-bar progress-bar-striped  progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>%; background-color: #CD7F32;">
                                            </div>  
                                        </div>
                                            </div>
                                            <div class="col-12 text-end">
                                            <span class="text-black-50 ms-2 fw-bold text-end"><?php echo $progress?>/100</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-1">
                                        <img src="./resources/platinum.png" height="60" alt="">
                                       
                                    </div>
                                </div>
                            <?php
                            } else if ($purchasenum >= 10) {
                            ?>
                                <div class="row mt-5">
                                    <div class="col-1">
                                        <img src="./resources/silver.png" height="60" alt="">
                                    </div>
                                    <div class="col-9 mt-3">
                                        <?php
                                        $progress = ($purchasenum - 10) * 20;

                                        ?>
                                        <div class="row">
                                            <div class="col-12">
                                            <div class="progress">
                                            <div class="progress-bar progress-bar-striped  progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>%; background-color: #CD7F32;">
                                            </div>  
                                        </div>
                                            </div>
                                            <div class="col-12 text-end">
                                            <span class="text-black-50 ms-2 fw-bold text-end"><?php echo $progress?>/100</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-1">
                                        <img src="./resources/gold.png" height="60" alt="">
                                       
                                    </div>
                                </div>
                            <?php
                            } else if ($purchasenum >= 5) {
                            ?>
                                <div class="row mt-5">
                                    <div class="col-1">
                                        <img src="./resources/bronze.png" height="60" alt="">
                                    </div>
                                    <div class="col-9 mt-3">
                                        <?php
                                        $progress = ($purchasenum - 5) * 20;

                                        ?>
                                       <div class="row">
                                            <div class="col-12">
                                            <div class="progress">
                                            <div class="progress-bar progress-bar-striped  progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>%; background-color: #CD7F32;">
                                            </div>  
                                        </div>
                                            </div>
                                            <div class="col-12 text-end">
                                            <span class="text-black-50 ms-2 fw-bold text-end"><?php echo $progress?>/100</span>
                                            </div>
                                        </div>
                                        <?php


                                        ?>
                                    </div>
                                    <div class="col-1">
                                        <img src="./resources/silver.png" height="60" alt="">
                                      
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="row mt-5">
                                    <div class="col-1">
                                        <!-- <img src="./resources/bronze.png" height="60" alt=""> -->
                                    </div>
                                    <div class="col-9 mt-3">
                                        <?php
                                        $progress = ($purchasenum) * 20;

                                        ?>
                                        <div class="row">
                                            <div class="col-12">
                                            <div class="progress">
                                            <div class="progress-bar progress-bar-striped  progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>%; background-color: #CD7F32;">
                                            </div>  
                                        </div>
                                            </div>
                                            <div class="col-12 text-end">
                                            <span class="text-black-50 ms-2 fw-bold text-end"><?php echo $progress?>/100</span>
                                            </div>
                                        </div>
                                        
                                        

                                    </div>
                                    <div class="col-1">
                                        <img src="./resources/bronze.png" height="60" alt="">
                                        
                                    </div>
                                </div>
                            <?php
                            }


                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card p-5 shadow-sm p-3 mb-5 rounded">
                        <div class="row">
                            <div class="col-12">
                                <h6>Personal Profile | <a class="text-primary" style="cursor: pointer;" onclick="editProfileModal()">Edit</a></h6>

                            </div>
                            <?php

                            $u = $_SESSION["u"];

                            $gender_id = $_SESSION["u"]["gender_id"];
                            $ugender = Database::select("SELECT * FROM gender WHERE id= '" . $gender_id . "'");
                            $ngender = $ugender->fetch_assoc();



                            ?>
                            <div class="col-12">
                                <span class="form-label">Full Name : </span>
                                <input type="text" class="form-control mt-2 mb-2" value="<?php echo $u["fname"] . " " . $u["lname"] ?>" disabled>
                            </div>
                            <div class="col-12">
                                <span class="form-label">Gender : </span>
                                <input type="text" class="form-control mt-2 mb-2" value="<?php echo $ngender["name"] ?>" disabled>
                            </div>
                            <div class="col-12">
                                <span>Registered Email address : </span>
                                <input type="text" id="email" class="form-control mt-2 mb-2" value="<?php echo $u["email"] ?>" disabled>
                            </div>
                            <div class="col-12">
                                <span>Registered Mobile No : </span>
                                <input type="text" class="form-control mt-2 mb-2" value="<?php echo $u["mobile"] ?>" disabled>
                            </div>
                            <div class="col-12">
                                <span>Registered Date : </span>
                                <input type="text" class="form-control mt-2 mb-2" value="<?php echo $u["register_date"] ?>" disabled>
                            </div>
                            <?php

                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <?php
                    $purchasers = Database::select("SELECT * FROM `invoice` WHERE `user_email`='" . $u["email"] . "' AND `status`=4");
                    $purchnum = $purchasers->num_rows;
                    if ($purchnum >= 20) {
                    ?>
                        <div class="row shadow-sm p-3 mb-3 rounded px-5 shine-me" style="background-color: #e5e4e2; ">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <h4 class="fw-bolder fs-2 glow" style="color: #685f69;">Platinum Member</h2>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <img src="./resources/platinum.png" height="150px" alt="">
                            </div>

                        </div>
                    <?php
                    } else if ($purchnum >= 15) {
                    ?>
                        <div class="row shadow-sm p-3 mb-3 rounded px-5 shine-me" style="background-color: #d4af37;">

                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <h4 class="fw-bolder fs-2 glow" style="color: darkgoldenrod;">Gold Member</h2>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <img src="./resources/gold.png" height="150px" alt="">
                            </div>

                        </div>
                    <?php
                    } else if ($purchnum >= 10) {
                    ?>
                        <div class="row shadow-sm p-3 mb-3 rounded px-5 shine-me" style="background-color: #C0C0C0; ">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <h4 class="fw-bolder fs-2 glow" style="color: #7d7d7d;">Silver Member</h2>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <img src="./resources/silver.png" height="150px" alt="">
                            </div>

                        </div>
                    <?php
                    } else if ($purchnum >= 5) {
                    ?>
                        <div class="row shadow-sm p-3 mb-3 rounded px-5 shine-me" style="background-color: #CD7F32; ">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <h4 class="fw-bolder fs-2 glow" style="color: #542103;">Bronze Member</h2>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <img src="./resources/bronze.png" height="150px" alt="">
                            </div>

                        </div>
                    <?php
                    } else {
                    }
                    ?>

                    <div class="row card shadow-sm p-3 mb-2 rounded p-5">

                        <div class="col-10">
                            <div class="row">
                                <h5>Default Shipping Address</h5>
                                <?php
                                $d;
                                $city;
                                $district;
                                $province;
                                $useremail = $_SESSION["u"]["email"];
                                $addressrs = Database::select("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $useremail . "'");
                                $n = $addressrs->num_rows;
                                if ($n == 1) {
                                    $d = $addressrs->fetch_assoc();
                                    $city_id = $d["city_id"];
                                    $cityrs = Database::select("SELECT * FROM city WHERE id = '" . $city_id . "'");
                                    $city = $cityrs->fetch_assoc();

                                    $district_id = $city["district_id"];
                                    $udist = Database::select("SELECT * FROM district WHERE id = '" . $district_id . "'");
                                    $district = $udist->fetch_assoc();

                                    $province_id = $district["province_id"];
                                    $uprovince = Database::select("SELECT * FROM province WHERE id = '" . $province_id . "'");
                                    $province = $uprovince->fetch_assoc();
                                ?>
                                    <p><?php echo $d["no"] . ", " . $d["line_1"] . ", " .  $d["line_2"] . ", " . $city["name"] . ", " . $district["name"] . ", " . $province["name"] ?> Province&nbsp;<a onclick="editShippingAddressModal()" style="cursor: pointer;" class="text-primary">Edit</a></p>
                                <?php
                                } else {
                                ?>
                                    <span class="text-primary" onclick="editShippingAddressModal()">edit</span>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="row card p-3 mb-5">

                <div class="col-12">
                    <h5 class="display-6 fw-bold">Track My Orders</h5>
                </div>
                <hr>
                <?php
                $ordersrs = Database::select("SELECT * FROM `invoice` WHERE `user_email`='" . $uemail . "' AND `status` IN ('1','2','3')");
                $ordernum = $ordersrs->num_rows;
                for ($p = 0; $p < $ordernum; $p++) {
                    $order = $ordersrs->fetch_assoc();
                ?>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 card-header">
                                <h6>Order Id : <?php echo $order["order_id"] ?></h6>
                            </div>
                            <hr>
                            <div class="col-12">
                                <ol class="ProgressBar ">
                                    <?php
                                    if ($order["status"] == "1") {
                                    ?>
                                        <li class="ProgressBar-step is-complete">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Processing</span>
                                        </li>
                                        <li class="ProgressBar-step">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Order Confirmed</span>
                                        </li>
                                        <li class="ProgressBar-step">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Out for Delivery</span>
                                        </li>
                                        <li class="ProgressBar-step">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Delivered</span>
                                        </li>
                                    <?php
                                    } else if ($order["status"] == "2") {
                                    ?>
                                        <li class="ProgressBar-step is-complete">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Processing</span>
                                        </li>
                                        <li class="ProgressBar-step is-complete">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Order Confirmed</span>
                                        </li>
                                        <li class="ProgressBar-step">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Out for Delivery</span>
                                        </li>
                                        <li class="ProgressBar-step">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Delivered</span>
                                        </li>
                                    <?php
                                    } else if ($order["status"] == "3") {
                                    ?>
                                        <li class="ProgressBar-step is-complete">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Processing</span>
                                        </li>
                                        <li class="ProgressBar-step is-complete">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Order Confirmed</span>
                                        </li>
                                        <li class="ProgressBar-step is-complete">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Out for Delivery</span>
                                        </li>
                                        <li class="ProgressBar-step">
                                            <svg class="ProgressBar-icon">
                                                <use xlink:href="#checkmark-bold" />
                                            </svg>
                                            <span class="ProgressBar-stepLabel">Delivered</span>
                                        </li>
                                    <?php
                                    }
                                    ?>

                                </ol>
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10 offset-1">
                                        <table class="table">
                                            <?php
                                            $invoiceirs = Database::select("SELECT * FROM `invoice_item` WHERE `invoice_id`='" . $order["id"] . "'");
                                            $innum = $invoiceirs->num_rows;
                                            if ($innum > 0) {
                                                for ($z = 0; $z < $innum; $z++) {
                                                    $innrs = $invoiceirs->fetch_assoc();
                                                    $prors = Database::select("SELECT * FROM `product` WHERE `id`='" . $innrs["product_id"] . "'");
                                                    $prorow = $prors->fetch_assoc();
                                                    $imagers = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $innrs["product_id"] . "'");
                                                    $imagerow = $imagers->fetch_assoc();
                                            ?>
                                                    <tr class="">
                                                        <td><img src="<?php echo $imagerow["code"] ?>" alt="" height="100px"></td>
                                                        <td class="">
                                                            <p class="mt-4 fw-bold fs-6 "><?php echo $prorow["title"] ?></p>
                                                        </td>
                                                        <td class="">
                                                            <p class="mt-4 fw-bold fs-6 ">Rs.<?php echo $prorow["price"] ?>.00</p>
                                                        </td>
                                                        <td class="">
                                                            <p class="mt-4 fw-bold fs-6 "><?php echo $innrs["qty"] ?></p>
                                                        </td>
                                                        <td class="">
                                                            <p class="mt-4 fw-bold fs-6 text-primary">Cancel</p>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }

                                            ?>


                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="row card p-3 mb-5">
                <div class="col-12 mb-3">
                    <h5 class="display-6 fw-bold">Chat with Admin</h5>
                </div>
                <hr>
                <div class="col-12 bg-white" style="height: 500px; overflow-y: scroll;">
                    <div class="row" id="ChatBox<?php echo $uemail ?>">


                    </div>
                </div>

                <div class="input-group">
                    <input type="text" id="msgtext" placeholder="type your message..." aria-describedby="send-btn" class="form-control rounded-0 border border-1 border-primary py-4 bg-light">
                    <button id="send-btn" class="btn btn-primary" onclick="sendMessageToAdmin('<?php echo $uemail ?>')"><i class="fas fa-paper-plane"></i></button>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success">
                                <?php
                                $purchasers = Database::select("SELECT * FROM `invoice` WHERE `user_email`='" . $u["email"] . "' AND `status`=4");
                                $purchnum = $purchasers->num_rows;
                                ?>
                                <h3>Total Purchases</h3>
                                <h6><?php echo $purchnum ?> Purchases</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row card p-3">
                <div class="col-12">
                    <table class="table">
                        <tr class="card-header">
                            <td>Order Id</td>
                            <td>Placed On</td>
                            <td>Items</td>
                            <td>Amount</td>
                        </tr>


                        <?php
                        for ($y = 0; $y < $purchnum; $y++) {
                            $purchrow = $purchasers->fetch_assoc();


                        ?>
                            <tr>
                                <td>#<?php echo $purchrow["order_id"] ?></td>
                                <td> <?php
                                        $datee = $purchrow["date"];
                                        $splitdt = explode(" ", $datee);
                                        echo $splitdt[0];
                                        ?>
                                </td>
                                <td>
                                    <?php
                                    $i_irs = Database::select("SELECT * FROM `invoice_item` WHERE `invoice_id`='" . $purchrow["id"] . "'");
                                    $i_inum = $i_irs->num_rows;
                                    for ($p = 0; $p < $i_inum; $p++) {
                                        $i_irow = $i_irs->fetch_assoc();
                                        $imgrow = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $i_irow["product_id"] . "'");
                                        $img_rs = $imgrow->fetch_assoc();

                                    ?>
                                        <img style="cursor: pointer;" onclick="addFeedBack(<?php echo $img_rs['product_id']  ?>)" src="<?php echo $img_rs["code"] ?>" class="img-sm img-thumbnail" alt="">
                                        <div class="modal fade" id="feedbackModal<?php echo $img_rs['product_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <?php
                                                        $product = Database::select("SELECT * FROM `product` WHERE `id`='" . $img_rs['product_id'] . "'");
                                                        $productrow = $product->fetch_assoc();
                                                        ?>
                                                        <h5 class="modal-title" id="exampleModalToggleLabel2"><?php echo $productrow["title"] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-12">
                                                            <h5 class="" id="exampleModalLabel">Are you satisfied with the product? Write Us......</h5>
                                                            <input type="text" class="form-control" id="feedtext<?php echo $img_rs['product_id'] ?>">
                                                        </div>
                                                        <div class="col-12 mt-3">
                                                            <div class="row">
                                                                <h5 class="" id="exampleModalLabel">How many stars would you give for this product?</h5>
                                                                <div class="col-8 offset-2">
                                                                    <div class="star-widget ">
                                                                        <input type="radio" name="rate" class="d-none" id="rate-1<?php echo $img_rs['product_id'] ?>">
                                                                        <label for="rate-1<?php echo $img_rs['product_id'] ?>" class="fas fa-star"></label>
                                                                        <input type="radio" name="rate" class="d-none" id="rate-2<?php echo $img_rs['product_id'] ?>">
                                                                        <label for="rate-2<?php echo $img_rs['product_id'] ?>" class="fas fa-star"></label>
                                                                        <input type="radio" name="rate" class="d-none" id="rate-3<?php echo $img_rs['product_id'] ?>">
                                                                        <label for="rate-3<?php echo $img_rs['product_id'] ?>" class="fas fa-star"></label>
                                                                        <input type="radio" name="rate" class="d-none" id="rate-4<?php echo $img_rs['product_id'] ?>">
                                                                        <label for="rate-4<?php echo $img_rs['product_id'] ?>" class="fas fa-star "></label>
                                                                        <input type="radio" name="rate" class="d-none" id="rate-5<?php echo $img_rs['product_id'] ?>">
                                                                        <label for="rate-5<?php echo $img_rs['product_id'] ?>" class="fas fa-star "></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                        <button type="button" class="btn btn-primary" onclick="saveFeedback(<?php echo $img_rs['product_id'] ?>)">Save Feedback</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }

                                    ?>
                                </td>
                                <td class="text-start">Rs. <?php echo $purchrow["total"] ?>.00</td>
                                <td>

                                </td>


                            </tr>


                        <?php
                        }
                        ?>




                    </table>


                </div>
            </div>
        </div>
        </div>








        <?php
        require "./components/footer.php"
        ?>

        <div class="modal fade" id="editAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12 d-block">
                                <p class="text-danger" id="modalErr"></p>
                            </div>

                            <div class="col-12">
                                <span class="form-label">First Name : </span>
                                <input type="text" id="fname" class="form-control mt-2 mb-2" value="<?php echo $u["fname"] ?>">
                            </div>

                            <div class="col-12">
                                <span class="form-label">Last Name : </span>
                                <input type="text" id="lname" class="form-control mt-2 mb-2" value="<?php echo $u["lname"] ?>">
                            </div>
                            <div class="col-12">
                                <span>Registered Mobile No : </span>
                                <input type="text" id="mobile" class="form-control mt-2 mb-2" value="<?php echo $u["mobile"] ?>">
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateProfile()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editaddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Your Location</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <?php
                            $useremail = $_SESSION["u"]["email"];
                            $addressrs = Database::select("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $useremail . "'");
                            $n = $addressrs->num_rows;
                            if ($n == 1) {
                                $d = $addressrs->fetch_assoc();
                            ?>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Edit your shipping address</h6>
                                        </div>
                                        <div class="col-12">
                                            <span class="form-label">No </span>
                                            <input type="text" id="no" class="form-control mt-2 mb-2" value="<?php echo $d["no"] ?>">
                                        </div>
                                        <div class="col-12">
                                            <span class="form-label">Line 1 </span>
                                            <input type="text" id="line1" class="form-control mt-2 mb-2" value="<?php echo $d["line_1"] ?>">
                                        </div>
                                        <div class="col-12">
                                            <span class="form-label">Line 2 </span>
                                            <input type="text" id="line2" class="form-control mt-2 mb-2" value="<?php echo $d["line_2"] ?>">
                                        </div>
                                        <div class="col-12">
                                            <span class="form-label">Province </span>
                                            <select class="form-select" id="province" onchange="bringDistrict()">
                                                <option value="<?php echo $province["id"] ?>"><?php echo $province["name"] ?></option>
                                                <?php
                                                $provincers = Database::select("SELECT * FROM `province`");
                                                $pn = $provincers->num_rows;
                                                $pr;
                                                for ($i = 0; $i < $pn; $i++) {
                                                    $pr = $provincers->fetch_assoc();


                                                    if ($province["id"] != $pr["id"]) {
                                                ?>
                                                        <option value="<?php echo $pr["id"] ?>"><?php echo $pr["name"] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <span class="form-label">District </span>
                                            <select class="form-select" id="district" onchange="bringCity()">
                                                <option value="<?php echo $district["id"] ?>"><?php echo $district["name"] ?></option>
                                                <?php
                                                $districts = Database::select("SELECT * FROM `district`");
                                                $dn = $districts->num_rows;
                                                $dr;
                                                for ($i = 0; $i < $dn; $i++) {
                                                    $dr = $districts->fetch_assoc();

                                                    if ($district["id"] != $dr["id"]) {
                                                ?>
                                                        <option value="<?php echo $dr["id"] ?>"><?php echo $dr["name"] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <span class="form-label">City </span>
                                            <select class="form-select" id="city">
                                                <option value="<?php echo $city["id"] ?>"><?php echo $city["name"] ?></option>
                                                <?php
                                                $cityrs = Database::select("SELECT * FROM `city`");
                                                $cn = $cityrs->num_rows;
                                                $cr;
                                                for ($i = 0; $i < $dn; $i++) {
                                                    $cr = $cityrs->fetch_assoc();

                                                    if ($city["id"] != $cr["id"]) {
                                                ?>
                                                        <option value="<?php echo $dr["id"] ?>"><?php echo $dr["name"] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            } else {
                            ?>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Edit your shipping address</h6>
                                        </div>
                                        <div class="col-12">
                                            <span class="form-label">No </span>
                                            <input type="text" id="no" class="form-control mt-2 mb-2" value="">
                                        </div>
                                        <div class="col-12">
                                            <span class="form-label">Line 1 </span>
                                            <input type="text" id="line1" class="form-control mt-2 mb-2" value="">
                                        </div>
                                        <div class="col-12">
                                            <span>Line 2 </span>
                                            <input type="text" id="line2" class="form-control mt-2 mb-2" value="">
                                        </div>
                                        <div class="col-12">
                                            <span>Province </span>
                                            <select class="form-select" id="province" onchange="bringDistrict()">
                                                <option>Select Province</option>
                                                <?php
                                                $provincers = Database::select("SELECT * FROM `province`");
                                                $pn = $provincers->num_rows;

                                                for ($i = 0; $i < $pn; $i++) {
                                                    $pr = $provincers->fetch_assoc();


                                                ?>
                                                    <option value="<?php echo $pr["id"] ?>"><?php echo $pr["name"] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <span>District </span>
                                            <select class="form-select" id="district" onchange="bringCity()">
                                                <option>Select District</option>
                                                <?php


                                                for ($i = 0; $i < $dn; $i++) {
                                                    $dr = $districts->fetch_assoc();


                                                ?>
                                                    <option value="<?php echo $dr["id"] ?>"><?php echo $dr["name"] ?></option>
                                                <?php

                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <span class="form-label">City </span>
                                            <select class="form-select" id="city">
                                                <option>Select City</option>
                                                <?php


                                                for ($i = 0; $i < $dn; $i++) {
                                                    $cr = $cityrs->fetch_assoc();


                                                ?>
                                                    <option value="<?php echo $dr["id"] ?>"><?php echo $dr["name"] ?></option>
                                                <?php

                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }

                            ?>



                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addAddress()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var mybutton = document.getElementById("goToTopBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.className = "btn btn-danger text-light d-block";
                } else {
                    mybutton.className = "d-none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <script src="thief.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "index.php"
    </script>

<?php
}
