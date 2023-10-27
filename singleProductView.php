<?php
session_start();
require "connection.php";
if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];

    $product = Database::select("SELECT * FROM `product_details` WHERE `pid`='" . $pid . "'");
    $pr = $product->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $pr["title"] ?></title>
        <link rel="icon" href="./resources/logo.svg">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    </head>

    <body style="overflow-x: hidden;">
        <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
        <?php
        require "./components/header.php";
        ?>


        <div class="container">
            <div class="row" id="productDetails">
                <div class="col-12">
                    <div class="row">
                        <div id="pro">
                            <div class="col-12 card p-5">
                                <div class="row">
                                    <div class="col-12 col-md-4" data-zoom data-zoom-max="1" id="imageContainer">

                                        <img src="<?php echo $pr["code"] ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <h3 class="mb-2"><?php echo $pr["title"] ?> | <?php echo $pr["sname"] ?> | <?php echo $pr["bname"] ?> | <?php echo $pr["cname"] ?> | <?php echo $pr["colname"] ?> </h3>
                                        <p><?php echo $pr["bname"] ?></p>
                                        <hr>
                                        <h5 class="text-black-50"><?php echo $pr["title"] ?></h5>
                                        <?php
                                        $dprice = "0";
                                        $p_price = $pr["price"];
                                        if (isset($_SESSION["u"])) {

                                            $invoice = Database::select("SELECT * FROM `invoice` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                                            $ins = $invoice->num_rows;
                                            if ($ins >= 20) {
                                                $dprice = $p_price / 100 * 15;
                                                $new_i_price = $p_price - $dprice;
                                                $n_price = round($new_i_price);
                                        ?><div class="alert alert-warning">
                                                    <span><i class="fas fa-tags fs-5"></i>&nbsp;You have been granted with 15% discount on all purchases</span>
                                                </div>
                                                <span class=" mb-3 fs-1"><b>Rs. <?php echo $n_price ?>.00</b> </span>
                                                <span class=" mb-3"><b><del class="text-danger"> Rs. <?php echo $p_price ?>.00</del></b> </span>
                                            <?php
                                            } else if ($ins >= 15) {
                                                $dprice = $p_price / 100 * 10;
                                                $new_i_price = $p_price - $dprice;
                                                $n_price = round($new_i_price);
                                            ?><div class="alert alert-warning">
                                                    <span><i class="fas fa-tags fs-5"></i>&nbsp;You have been granted with 10% discount on all purchases</span>
                                                </div>
                                                <span class=" mb-3 fs-1"><b>Rs. <?php echo $n_price ?>.00</b> </span>
                                                <span class=" mb-3"><b><del class="text-danger"> Rs. <?php echo $p_price ?>.00</del></b> </span>
                                            <?php
                                            } else if ($ins >= 10) {
                                                $dprice = $p_price / 100 * 5;
                                                $new_i_price = $p_price - $dprice;
                                                $n_price = round($new_i_price);
                                            ?><div class="alert alert-warning">
                                                    <span><i class="fas fa-tags fs-5"></i>&nbsp;You have been granted with 5% discount on all purchases</span>
                                                </div>
                                                <span class=" mb-3 fs-1"><b>Rs. <?php echo $n_price ?>.00</b> </span>
                                                <span class=" mb-3"><b><del class="text-danger"> Rs. <?php echo $p_price ?>.00</del></b> </span>
                                            <?php
                                            } else if ($ins >= 5) {
                                                $dprice = $p_price / 100 * 2;
                                                $new_i_price = $p_price - $dprice;
                                                $n_price = round($new_i_price);
                                            ?><div class="alert alert-warning">
                                                    <span><i class="fas fa-tags fs-5"></i>&nbsp;You have been granted with 2% discount on all purchases</span>
                                                </div>
                                                <span class=" mb-3 fs-1"><b>Rs. <?php echo $n_price ?>.00</b> </span>
                                                <span class=" mb-3"><b><del class="text-danger"> Rs. <?php echo $p_price ?>.00</del></b> </span>
                                            <?php
                                            } else {
                                            ?>
                                                <h3 class="mt-2 mb-3"><b>Rs. <?php echo $p_price ?>.00</b> </h3>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <h3 class="mt-2 mb-3"><b>Rs. <?php echo $p_price ?>.00</b> </h3>
                                            <?php
                                        }
                                        if (isset($_SESSION["u"])) {
                                            $usership = Database::select("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                                            $usershipnum = $usership->num_rows;
                                            if ($usershipnum == 1) {
                                                $usershiprs = $usership->fetch_assoc();
                                                $city_id = $usershiprs["city_id"];

                                                $cityrs = Database::select("SELECT * FROM `city` WHERE `id`='" . $city_id . "'");
                                                $cr = $cityrs->fetch_assoc();

                                                $district_id = $cr["district_id"];

                                                $delivery = "0";

                                                if ($district_id == "1") {
                                                    $delivery = $pr["deliver_fee_colombo"];
                                                } else {
                                                    $delivery = $pr["deliver_fee_outside_colombo"];
                                                }
                                            ?>

                                                <div class="alert alert-secondary">
                                                    <h6>Shipping Cost : <span class="">Rs. <?php echo $delivery ?>.00</span></h6>
                                                </div>


                                        <?php
                                            } else {
                                            }
                                        }

                                        ?>



                                        <h6>Category : <span class="text-primary"><?php echo $pr["cname"] ?></span></h6>
                                        <h6>Sub Category : <span class="text-primary"><?php echo $pr["sname"] ?></span></h6>
                                        <h6>Availibility :
                                            <?php
                                            if ($pr["qty"] > 0) {
                                            ?>
                                                <span class="text-warning">In Stock</span>
                                        </h6>
                                    <?php
                                            } else {
                                    ?>
                                        <span class="text-danger">Out of Stock</span></h6>
                                    <?php
                                            }
                                    ?>

                                    <p class="mt-3"><?php echo $pr["description"] ?>
                                    </p>

                                    <div class="row mt-3">
                                        <div class="col-2 mt-2">
                                            <h6>Size :</h6>
                                        </div>
                                        <div class="col-8">

                                            <?php
                                            $productrs = Database::select("SELECT * FROM `product` WHERE `id`= '" . $pr["pid"] . "'");
                                            $productrows = $productrs->fetch_assoc();

                                            $chsrs = Database::select("SELECT * FROM `category_has_size` WHERE `id`='" . $productrows["category_has_size_id"] . "'");
                                            $chsrows = $chsrs->fetch_assoc();

                                            $sizers = Database::select("SELECT * FROM `size` WHERE `id`='" . $chsrows["size_id"] . "'");
                                            $sizerows = $sizers->fetch_assoc();

                                            ?>
                                            <input class="form-input" id="sizes" value="<?php echo $sizerows["name"] ?>" disabled>



                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-2 mt-2">
                                            <h6>Color :</h6>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-input " id="colors" value="<?php echo $pr["colname"] ?>" disabled>
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-2 mt-1">
                                            <p class="d-inline">Quantity:
                                        </div>
                                        <?php
                                        if ($pr["qty"] > 0) {
                                        ?>
                                            <div class="col-2">
                                                <span><input type="number" min=1 id="sst" max="<?php echo $pr["qty"] ?>" value="1" class="form-control"></span>
                                            </div>
                                            <div class="col-8">
                                                <button type="button" onclick="addToCart(<?php echo $pr['pid'] ?>)" class="btn btn-warning text-light">Add to Cart</button>
                                                <button class="btn btn-danger" onclick="addToWishlist(<?php echo $pr['pid'] ?>)">Add to Wishlist</button>
                                            </div>
                                            <div class="col-10 d-grid mt-3">
                                                <button class="btn btn-primary" onclick="payNow(<?php echo $pr['pid'] ?>)">
                                                    Buy Now
                                                </button>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-2">
                                                <span><input type="number" min=1 id="sst" max="<?php echo $pr["qty"] ?>" value="1" disabled class="form-control"></span>
                                            </div>
                                            <div class="col-8">
                                                <button type="button" onclick="addToCart(<?php echo $pr['pid'] ?>)" disabled class="btn btn-warning text-light">Add to Cart</button>
                                                <button class="btn btn-danger" onclick="addToWishlist(<?php echo $pr['pid'] ?>)" disabled>Add to Wishlist</button>
                                            </div>
                                            <div class="col-10 d-grid mt-3">
                                                <button class="btn btn-primary" onclick="payNow(<?php echo $pr['pid'] ?>)" disabled>
                                                    Buy Now
                                                </button>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <div class="alert alert-success alert-dismissible fade show mt-3 text-uppercase" role="alert">
                                            <strong><i class="fas fa-truck fs-5"></i></strong>&nbsp; Cash on Delivery Available.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <div class="alert alert-warning alert-dismissible fade show text-uppercase mt-3" role="alert">
                                            <strong><i class="fas fa-tags fs-5"></i></strong>&nbsp; Subscribe an earn 5% instant discount for any product.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>

                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="row">

                                            <div class="col-12 mt-2 text-center">
                                                <p><b>Shop address :</b></p>
                                                <p>Maradana, Colombo 10, Sri Lanka</p>
                                            </div>
                                            <div class="col-12 mt-2 text-center">
                                                <p><b>Shipping Details :</b></p>
                                                <label>Greater Colombo</label>
                                                <label>Ship from Overseas</label>
                                                <label>Will take 6-9 days</label>
                                            </div>
                                            <div class="col-12 mt-3 text-center">
                                                <p class="mb-2"><b>Payment Method :</b></p>
                                                <img src="./resources/Credit-Card-Iconscopy.jpg" height="25px" width="auto" alt="">

                                            </div>
                                            <div class="alert alert-danger mt-4 ms-1 text-center" role="alert">
                                                Due to Covid 19 Deliveries can be delayed.sorry for the inconvenience may cause by the delay
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 card mt-5">
                                <div class="row p-3 py-5">
                                    <div class="col-md-6 col-12">
                                        <h6 class="fw-bolder mb-2">User Rating :</h6>
                                        <?php

                                        $i_items = Database::select("SELECT COUNT(`id`) AS `num_count`,ROUND(AVG(`rating`),1) AS `rating` FROM `feedback` WHERE `product_id`='" . $pr['pid'] . "'");

                                        $i_itemnum = $i_items->fetch_assoc();
                                        $rating = $i_itemnum["rating"];
                                        $count = $i_itemnum["num_count"];
                                        if ($rating > 0) {
                                            for ($s = 0; $s < 5; $s++) {
                                                if ($s < $rating) {
                                        ?>
                                                    <span class="fa fa-star fs-1 fw-bolder text-warning"></span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="fa fa-star fs-1 fw-bolder " style="color: #cfcfcf;"></span>
                                            <?php
                                                }
                                            }
                                            ?>



                                            <hr>
                                            <p><span class="display-1 fw-bolder"><?php echo $rating ?></span> average based on <span class="fw-bolder fs-3"><?php echo $count ?></span> reviews</p>
                                            <?php
                                        } else {

                                            for ($s = 0; $s < 5; $s++) {

                                            ?>
                                                <span class="fa fa-star fs-1 fw-bolder " style="color: #cfcfcf;"></span>
                                            <?php


                                            }
                                            ?>



                                            <hr>
                                            <p><span class="display-1 fw-bolder">0.0</span> average based on <span class="fw-bolder fs-3">0</span> reviews</p>
                                        <?php
                                        }




                                        ?>

                                    </div>
                                    <div class="col-md-6 col-12">
                                        <?php

                                        for ($z = 1; $z <= 5; $z++) {
                                            $perc = Database::select("SELECT `rating` FROM `feedback` WHERE `product_id`='" . $pr['pid'] . "' AND `rating`='" . $z . "';");
                                            $percnum = $perc->num_rows;
                                            $percfr = $perc->fetch_assoc();
                                            if ($count > 0) {
                                                $perc_for_z = (int)$percnum / (int)$count * 100;
                                            } else {
                                                $perc_for_z = 0;
                                            }

                                            $num = ceil($perc_for_z)
                                        ?>
                                            <div class="row">
                                                <div class="side d-flex justify-content-between">
                                                    <span class="fw-bold fs-6"><?php echo $z ?> star</span>
                                                    <span class="fw-bold fs-6"><?php echo $percnum ?> Reviews</span>
                                                </div>
                                                <div class="mt-2 mb-2">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $num ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $num ?>%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>



                                    </div>
                                </div>
                            </div>

                            <div class="col-12 card mt-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row p-3">
                                            <div class="col-6">
                                                <h5 class="card-header bg-primary text-white">Reviews</h5>
                                                <?php
                                                $feedback = Database::select("SELECT * FROM `feedback` WHERE `product_id`='" . $pr['pid'] . "' LIMIT 3");
                                                $feedbacknum = $feedback->num_rows;

                                                if ($feedbacknum > 0) {



                                                    for ($i = 0; $i < $feedbacknum; $i++) {
                                                        $feedbackrow = $feedback->fetch_assoc();


                                                        $user_rating = $feedbackrow["rating"];
                                                ?>
                                                        <div class="shadow p-3 mb-5 bg-light rounded mt-3">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between">
                                                                    <?php
                                                                    $customer = Database::select("SELECT * FROM `user` WHERE `email`='" . $feedbackrow["user_email"] . "'");
                                                                    $customer_row = $customer->fetch_assoc();

                                                                    ?>
                                                                    <div>
                                                                        <p class="card-title"><b><?php echo $customer_row["fname"] . " " . $customer_row["lname"] ?></b></p>
                                                                    </div>

                                                                    <div>
                                                                        <?php
                                                                        for ($s = 0; $s < 5; $s++) {
                                                                            if ($s < $user_rating) {
                                                                        ?>
                                                                                <span class="fa fa-star fs-5 fw-bolder text-warning"></span>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <span class="fa fa-star fs-5 fw-bolder " style="color: #cfcfcf;"></span>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>


                                                                </div>
                                                                <p><b>
                                                                        <?php
                                                                        $input = $feedbackrow["date_time"];

                                                                        $adddate = new DateTime($input);
                                                                        $tdate = new DateTime();
                                                                        $tz = new DateTimeZone("Asia/Colombo");
                                                                        $tdate->setTimezone($tz);
                                                                        $endDate = new DateTime($tdate->format("Y-m-d H:i:s"));
                                                                        $difference = $endDate->diff($adddate);

                                                                        $seconds = $difference->format('%s');
                                                                        $minutes = $difference->format('%i');
                                                                        $hours = $difference->format('%H');
                                                                        $days = $difference->format('%d');
                                                                        $month = $difference->format('%m');
                                                                        $year = $difference->format('%Y');
                                                                        if ($seconds < 60 && $minutes < 1 && $hours < 1 && $days < 1 && $month < 1 && $year < 1) {
                                                                            echo $seconds . " Seconds ago ";
                                                                        } else if ($minutes < 60 && $hours < 1 && $days < 1 && $month < 1 && $year < 1) {
                                                                            echo $difference->format('%i') . " Minutes ago ";
                                                                        } else if ($hours < 24 && $days < 1 && $month < 1 && $year < 1) {
                                                                            echo $difference->format('%H') . " Hours ago ";
                                                                        } else if ($days < 30 && $month < 1 && $year < 1) {
                                                                            echo $difference->format('%d') . " Days ago ";
                                                                        } else if ($month < 12 && $year < 1) {
                                                                            echo $difference->format('%m') . " Months ago ";
                                                                        } else {
                                                                            echo $difference->format('%Y') . " Years ago ";
                                                                        }

                                                                        ?>

                                                                    </b></p>
                                                                <p class="card-text mt-2"><?php echo $feedbackrow["feed"] ?></p>

                                                            </div>

                                                        </div>

                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="col-12 text-center">
                                                        <a class="btn btn-outline-primary rounded-pill" href=<?php echo "productReviews.php?pid=" . ($feedbackrow["product_id"]); ?>>Show More</a>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <h2 class="text-black-50 fw-bold text-center mt-5">No Reviews for this product Yet.....</h2>
                                                <?php
                                                }
                                                ?>



                                            </div>
                                            <div class="col-6">
                                                <h5 class="card-header bg-warning text-white">Comments</h5>
                                                <div class="col-12 mt-3 shadow">
                                                    <div class="input-group">
                                                        <input type="text" id="msgtext" placeholder="Ask from Us..." aria-describedby="send-btn" class="form-control rounded-0 border border-1 py-4 bg-light">
                                                        <button id="send-btn" class="btn btn-warning" onclick="sendcomment(<?php echo $pr['pid'] ?>);"><i class="fas fa-paper-plane"></i></button>
                                                    </div>
                                                </div>

                                                <?php
                                                $comment = Database::select("SELECT * FROM `comments` WHERE `product_id`='" . $pr['pid'] . "' LIMIT 3");
                                                $commentnum = $comment->num_rows;

                                                if ($commentnum > 0) {



                                                    for ($f = 0; $f < $commentnum; $f++) {
                                                        $commentrow = $comment->fetch_assoc();
                                                ?>
                                                        <div class="shadow p-3 mb-5 bg-light rounded mt-3 pb-3">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between">
                                                                    <?php
                                                                    $customer = Database::select("SELECT * FROM `user` WHERE `email`='" . $commentrow["user_email"] . "'");
                                                                    $customer_row = $customer->fetch_assoc();

                                                                    ?>
                                                                    <p class="card-title"><b><?php echo $customer_row["fname"] . " " . $customer_row["lname"] ?></b></p>

                                                                </div>
                                                                <p><b>
                                                                        <?php
                                                                        $input = $commentrow["time_added"];

                                                                        $adddate = new DateTime($input);
                                                                        $tdate = new DateTime();
                                                                        $tz = new DateTimeZone("Asia/Colombo");
                                                                        $tdate->setTimezone($tz);
                                                                        $endDate = new DateTime($tdate->format("Y-m-d H:i:s"));
                                                                        $difference = $endDate->diff($adddate);

                                                                        $seconds = $difference->format('%s');
                                                                        $minutes = $difference->format('%i');
                                                                        $hours = $difference->format('%H');
                                                                        $days = $difference->format('%d');
                                                                        $month = $difference->format('%m');
                                                                        $year = $difference->format('%Y');
                                                                        if ($seconds < 60 && $minutes < 1 && $hours < 1 && $days < 1 && $month < 1 && $year < 1) {
                                                                            echo $seconds . " Seconds ago ";
                                                                        } else if ($minutes < 60 && $hours < 1 && $days < 1 && $month < 1 && $year < 1) {
                                                                            echo $difference->format('%i') . " Minutes ago ";
                                                                        } else if ($hours < 24 && $days < 1 && $month < 1 && $year < 1) {
                                                                            echo $difference->format('%H') . " Hours ago ";
                                                                        } else if ($days < 30 && $month < 1 && $year < 1) {
                                                                            echo $difference->format('%d') . " Days ago ";
                                                                        } else if ($month < 12 && $year < 1) {
                                                                            echo $difference->format('%m') . " Months ago ";
                                                                        } else {
                                                                            echo $difference->format('%Y') . " Years ago ";
                                                                        }
                                                                        ?>
                                                                    </b></p>
                                                                <p class="card-text mt-2"><?php echo $commentrow["content"] ?></p>

                                                            </div>
                                                            <?php
                                                            $reply = Database::select("SELECT * FROM `reply` WHERE `comments_id`='" . $commentrow["id"] . "'");
                                                            $replynum = $reply->num_rows;

                                                            if ($replynum > 0) {
                                                                $replyrow = $reply->fetch_assoc();
                                                                for ($b = 0; $b < $replynum; $b++) {
                                                            ?>
                                                                    <div class="row">
                                                                        <div class="col-2 mt-5">
                                                                            <i class=" ms-5 bi bi-reply-fill" style="font-size: 36px;"></i>
                                                                        </div>
                                                                        <div class="col-10 ">
                                                                            <div class="shadow-sm p-3 mb-5 bg-light rounded mt-3">
                                                                                <div class="card-body">
                                                                                    <div class="d-flex justify-content-between">
                                                                                        <p class="text-lg-center"><b>Admin</b></p>
                                                                                        <p><b>
                                                                                                <?php
                                                                                                $input = $replyrow["time_added"];

                                                                                                $adddate = new DateTime($input);
                                                                                                $tdate = new DateTime();
                                                                                                $tz = new DateTimeZone("Asia/Colombo");
                                                                                                $tdate->setTimezone($tz);
                                                                                                $endDate = new DateTime($tdate->format("Y-m-d H:i:s"));
                                                                                                $difference = $endDate->diff($adddate);

                                                                                                if ($seconds < 60 && $minutes < 1 && $hours < 1 && $days < 1 && $month < 1 && $year < 1) {
                                                                                                    echo $seconds . " Seconds ago ";
                                                                                                } else if ($minutes < 60 && $hours < 1 && $days < 1 && $month < 1 && $year < 1) {
                                                                                                    echo $difference->format('%i') . " Minutes ago ";
                                                                                                } else if ($hours < 24 && $days < 1 && $month < 1 && $year < 1) {
                                                                                                    echo $difference->format('%H') . " Hours ago ";
                                                                                                } else if ($days < 30 && $month < 1 && $year < 1) {
                                                                                                    echo $difference->format('%d') . " Days ago ";
                                                                                                } else if ($month < 12 && $year < 1) {
                                                                                                    echo $difference->format('%m') . " Months ago ";
                                                                                                } else {
                                                                                                    echo $difference->format('%Y') . " Years ago ";
                                                                                                }
                                                                                                ?>
                                                                                            </b></p>
                                                                                    </div>
                                                                                    <p class="mt-2"><small> <?php echo $replyrow["reply"] ?>
                                                                                        </small></p>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>

                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="col-12 text-center">
                                                        <a class="btn btn-outline-warning rounded-pill" href=<?php echo "productComments.php?pid=" . ($commentrow["product_id"]); ?>>Show More</a>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <h2 class="text-black-50 fw-bold text-center mt-5">No Comments on this product Yet.....</h2>
                                                    <h6 class="text-black-50 fw-bold text-center mt-3">Be the first and ask us?</h6>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="text-uppercase fs-4">Products You May LiKe</h5>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <?php
                                        $subCategory = Database::select("SELECT * FROM `product_details` WHERE `sname`='" . $pr["sname"] . "' OR `colname`='" . $pr["colname"] . "' AND `pid`!='" . $pr["pid"] . "' LIMIT 4");
                                        $subCNum = $subCategory->num_rows;
                                        for ($i = 0; $i < $subCNum; $i++) {
                                            $subCatRow = $subCategory->fetch_assoc();
                                        ?>
                                            <div class="col-9 offset-3 offset-lg-0 col-lg-3">
                                                <div class="box">
                                                    <?php
                                                    $imgrs = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $subCatRow["pid"] . "'");
                                                    $imgfr = $imgrs->fetch_assoc();
                                                    ?>
                                                    <!--img-box---------->
                                                    <div class="slide-img" style="height: 350px;">
                                                        <img alt="1" src="<?php echo $imgfr["code"] ?>">
                                                        <!--overlayer---------->
                                                        <div class="overlay">
                                                            <!--buy-btn------>
                                                            <a href="<?php echo "singleProductView.php?pid=" . ($subCatRow["pid"]); ?>" class="buy-btn">Buy Now</a>
                                                        </div>
                                                    </div>
                                                    <!--detail-box--------->
                                                    <div class="detail-box" style="height: 120px;">
                                                        <!--type-------->
                                                        <div class="type">
                                                            <a href="#"><?php echo $subCatRow["title"] ?></a>
                                                            <?php
                                                            $brs = Database::select("SELECT * FROM `brand` WHERE `id` = '" . $subCatRow["bid"] . "'");
                                                            $bfr = $brs->fetch_assoc();
                                                            ?>
                                                            <span><?php echo $bfr["name"] ?></span>
                                                            <?php
                                                            if ($productrows["qty"] == 0) {
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
                                                        <a href="#" class="price">Rs. <?php echo $subCatRow["price"] ?></a>

                                                    </div>

                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <?php
        require "./components/footer.php";
        ?>
        <script src="script.js"></script>
        <script>
            function Why() {
                alert("ok")
            }
        </script>
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



        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="zoom.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    </body>

    </html>

<?php
} else {
}
?>