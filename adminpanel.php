<?php
session_start();
require "connection.php";

if (isset($_SESSION["admin"])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Dashboard</title>
        <link rel="icon" href="./resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap2.css">
        <link rel="stylesheet" href="ui.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>

    <body style=" height: 100vh;">

    <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
        <?php
        require "./components/aside.php";
        ?>

        <main class="main-wrap">
            <section class="content-main" style="max-width:1200px">
                <div class="content-header">
                    <h2 class="content-title"> Summary </h2>
                </div>
                <div class="row">
                   
                    <div class="col-lg-4">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-success-light"><i class="fas fa-user text-success"></i></span>
                                <div class="text">
                                    <?php
                                    $ucount = Database::select("SELECT * FROM `user`");
                                    $usernum = $ucount->num_rows;
                                    ?>
                                    <h6 class="mb-1">Total Customers</h6> <span><?php echo $usernum; ?></span>
                                </div>
                            </article>
                        </div> <!-- card end// -->
                    </div> <!-- col end// -->
                    <div class="col-lg-4">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-warning-light"><i class="fas fa-shopping-bag text-warning"></i></span>
                                <div class="text">
                                    <?php
                                    $pcount = Database::select("SELECT * FROM `product`");
                                    $pronum = $pcount->num_rows;
                                    ?>
                                    <h6 class="mb-1">Total Products</h6> <span><?php echo $pronum; ?></span>
                                </div>
                            </article>
                        </div> <!--  end// -->
                    </div> <!-- col end// -->
                    <div class="col-lg-4">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-primary-light"><i class="fas fa-dollar-sign text-primary"></i></span>
                                <div class="text">
                                    <?php
                                    $date = date("Y-m-d");
                                    $dcount = Database::select("SELECT * FROM `invoice` WHERE `date`LIKE '%".$date."%'");
                                    $dcnum = $dcount->num_rows;
                                    ?>
                                    <h6 class="mb-1">Daily Sales</h6> <span><?php echo $dcnum; ?></span>
                                </div>
                            </article>

                        </div> <!-- card  end// -->
                    </div> <!-- col end// -->
                    <div class="col-lg-4">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-primary-light"><i class="fas fa-dollar-sign text-primary"></i></span>
                                <div class="text">
                                    <?php
                                    $scount = Database::select("SELECT * FROM `invoice`");
                                    $salenum = $scount->num_rows;
                                    ?>
                                    <h6 class="mb-1">Total Sales</h6> <span><?php echo $salenum; ?></span>
                                </div>
                            </article>

                        </div> <!-- card  end// -->
                    </div> <!-- col end// -->
                    <div class="col-lg-4">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-success-light"><i class="fas fa-money-bill-alt text-success"></i></span>
                                <div class="text">
                                    <?php
                                    $incomedcount = Database::select("SELECT SUM(`total`) AS `stotal` FROM `invoice` WHERE `date`LIKE '%".$date."%'");
                                    $idnum = $incomedcount->fetch_assoc();
                                    ?>
                                    <h6 class="mb-1">Daily Income</h6> <span>Rs. <?php echo $idnum["stotal"]; ?>.00</span>
                                </div>
                            </article>

                        </div> <!-- card  end// -->
                    </div> <!-- col end// -->
                    <div class="col-lg-4">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-success-light"><i class="fas fa-money-bill-alt text-success"></i></span>
                                <div class="text">
                                    <?php
                                    $incomecount = Database::select("SELECT SUM(`total`) AS `stotal` FROM `invoice`");
                                    $inum = $incomecount->fetch_assoc();
                                    ?>
                                    <h6 class="mb-1">Total Income</h6> <span>Rs. <?php echo $inum["stotal"]; ?>.00</span>
                                </div>
                            </article>

                        </div> <!-- card  end// -->
                    </div> <!-- col end// -->
                </div> <!-- row end// -->


                <div class="row">

                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <article class="card-body">



                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Trending Products</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <?php
                                                $p = Database::select("SELECT * FROM `product` ORDER BY `id` DESC LIMIT 3");
                                                $pnum = $p->num_rows;
                                                for ($i = 0; $i < $pnum; $i++) {
                                                    $pfr = $p->fetch_assoc();

                                                ?>
                                                    <tr>
                                                        <?php
                                                        $pImage = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $pfr["id"] . "'");
                                                        $imgrow = $pImage->fetch_assoc();
                                                        ?>
                                                        <td><img src="<?php echo $imgrow["code"]; ?>" class="img-sm img-thumbnail" alt="Item"></td>
                                                        <td><?php echo $pfr["id"] ?></td>
                                                        <td><b><?php echo $pfr["title"] ?></b></td>
                                                        <td>Rs. <?php echo $pfr["price"] ?>.00</td>
                                                        <td><?php echo $pfr["qty"] ?></td>
                                                        <?php
                                                        $s  = $pfr["status_id"];

                                                        if ($s == "1") {
                                                        ?>
                                                            <td><span id="blockbtn<?php echo $pfr['id'] ?>" style="cursor: pointer;" onclick="blockProduct('<?php echo $pfr['id'] ?>')" class="badge rounded-pill alert-success">Active</span></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td> <span id="blockbtn<?php echo $pfr['id'] ?>" style="cursor: pointer;" onclick="blockProduct('<?php echo $pfr['id'] ?>')" class="badge rounded-pill alert-danger">Deactive</span></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td>07.05.2020</td>

                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div> <!-- table-responsive end// -->
                                    </div> <!-- card-body end// -->
                                </div> <!-- card end// -->

                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">New Customers</h5>
                                        <div class="table-responsive">

                                            <table class="table table-hover">
                                                <?php
                                                $user = Database::select("SELECT * FROM `user` ORDER BY `register_date` DESC LIMIT 3");
                                                $usernum = $user->num_rows;

                                                for ($i = 0; $i < $usernum; $i++) {
                                                    $userfr = $user->fetch_assoc();

                                                ?>
                                                    <tr>

                                                        <td><b><?php echo $userfr["fname"] . " " . $userfr["lname"] ?></b></td>
                                                        <td><?php echo $userfr["email"] ?></td>
                                                        <td><?php echo $userfr["mobile"] ?></td>
                                                        <?php
                                                        if ($userfr["status_id"] == "1") {
                                                        ?>
                                                            <td><span class="badge rounded-pill alert-success">Active User</span></td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td><span class="badge rounded-pill alert-danger">Blocked User</span></td>
                                                        <?php
                                                        }
                                                        ?>

                                                        <td><?php echo $userfr["register_date"] ?></td>

                                                    </tr>

                                                <?php
                                                }
                                                ?>


                                            </table>
                                        </div> <!-- table-responsive end// -->
                                    </div> <!-- card-body end// -->
                                </div> <!-- card end// -->

                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Latest Transactions</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <?php
                                                $o = Database::select("SELECT * FROM `invoice` ORDER BY `id` DESC LIMIT 3");
                                                $onum = $o->num_rows;
                                                for ($i = 0; $i < $onum; $i++) {
                                                    $sr = $o->fetch_assoc();

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
                                                                <span style="cursor: pointer;" class="badge rounded-pill alert-success">Complete</span>
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

                                                                                <div class="col-lg-2 col-sm-2 col-4 text-end">
                                                                                    <span style="cursor: pointer;" class="badge rounded-pill alert-success">Complete</span>
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

                                            </table>
                                        </div> <!-- table-responsive end// -->
                                    </div> <!-- card-body end// -->
                                </div> <!-- card end// -->

            </section> <!-- content-main end// -->
        </main>
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
    

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php
}else{
    ?>
<script>
    window.location="adminSignin.php";
</script>
    <?php
}
?>