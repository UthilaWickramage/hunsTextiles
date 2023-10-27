<?php
require "connection.php";
$pid = $_GET["pid"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews</title>
    <link rel="icon" href="./resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="bootstrap2.css">
    <link rel="stylesheet" href="ui.css">
</head>

<body>
    <div class="container">

        <div class="row p-3">
            <div class="col-12 card p-3">
                <?php
                $pr = Database::select("SELECT * FROM `product_details` WHERE `pid`='" . $pid . "'");
                $prrow = $pr->fetch_assoc();
                ?>
                <div class="row">
                    <div class="col-1 text-end">
                    <img src="<?php echo $prrow["code"]?>" alt="" class="img-sm img-thumbnail">
                    </div>
                    <div class="col-6">
                        <h2><?php echo $prrow["title"] ?></h2>
                    </div>
                    <div class="col-4 text-end">
                        <h3><?php echo $prrow["bname"] ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 card mt-3 mb-5">

                <div class="row p-3 py-5">
                    <div class="col-md-6 col-12">
                        <h6 class="fw-bolder mb-2">User Rating :</h6>
                        <?php

                        $i_items = Database::select("SELECT COUNT(`id`) AS `num_count`,ROUND(AVG(`rating`),1) AS `rating` FROM `feedback` WHERE `product_id`='" . $pid . "'");

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
                            $perc = Database::select("SELECT `rating` FROM `feedback` WHERE `product_id`='" . $pid . "' AND `rating`='" . $z . "';");
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
            <div class="col-12">
                <h5 class="card-header bg-primary text-white">Reviews</h5>
                <?php
                $feedback = Database::select("SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "' ORDER BY `date_time` DESC ");
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
                   
                <?php
                } else {
                ?>
                    <h2 class="text-black-50 fw-bold text-center mt-5">No Reviews for this product Yet.....</h2>
                <?php
                }
                ?>



            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>