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
    <title>Product Comments</title>
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
            <div class="col-12 card p-3">
            
                                            <h5 class="card-header bg-warning text-white">Comments</h5>
                                            <div class="col-12 mt-3 shadow">
                                                <div class="input-group">
                                                    <input type="text" id="msgtext" placeholder="Ask from Us..." aria-describedby="send-btn" class="form-control rounded-0 border border-1 py-4 bg-light">
                                                    <button id="send-btn" class="btn btn-warning" onclick="sendcomment(<?php echo $pid ?>);"><i class="fas fa-paper-plane"></i></button>
                                                </div>
                                            </div>

                                            <?php
                                            $comment = Database::select("SELECT * FROM `comments` WHERE `product_id`='" . $pid . "' ORDER BY `time_added` DESC");
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
    <script src="script.js"></script>
</body>
</html>