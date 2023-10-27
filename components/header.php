<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="page-speed.css">
    <link rel="stylesheet" href="bootstrap.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="header-area ">
        <div class="header-top d-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><a class="text-decoration-none" href="#">About Us</a></li>
                                    <li><a class="text-decoration-none" href="#">Privacy</a></li>
                                    <li><a class="text-decoration-none" href="#">FAQ</a></li>
                                    <li><a class="text-decoration-none" href="#">Careers</a></li>
                                </ul>
                            </div>
                            <div class="header-info-right d-flex">
                                <ul class="order-list list-unstyled">

                                <li><a class="text-decoration-none" href="adminSignin.php">Admin</a></li>
                                    <?php
                                    if (isset($_SESSION["u"])) {
                                        $user = $_SESSION["u"];


                                        $full_name =  $user["fname"] . ' ' . $user["lname"];
                                    ?>

                                        <li><a class="text-decoration-none" style="cursor: pointer;" onclick="SignOut()">Sign Out</a></li>
                                        <li><a class="text-decoration-none" href="userProfile.php">My Purchase History</a></li>
                                        <li><a class="text-decoration-none" href="userProfile.php"><?php echo $full_name; ?></a></li>
                                    <?php
                                    } else {
                                        $full_name = "Sign In / Register";
                                    ?>
                                        <li><a class="text-decoration-none" href="index.php"><?php echo $full_name; ?></a></li>
                                    <?php

                                    }
                                    ?>

                                </ul>
                                <ul class="header-social">
                                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                    <li> <a href="#"><i class="bi bi-twitter"></i></a></li>
                                    <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                                    <li><a href="#"><i class="bi bi-google"></i></a></li>
                                    <li> <a href="#"><i class="bi bi-linkedin"></i></a></li>
                                </ul>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid">
            <div class="container">
                <div class="menu-wrapper">

                    <div class="logo">
                        <a href="home.php"><img src="./resources/logo.svg" height="75px" width="auto" alt="" data-pagespeed-url-hash="436952282" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                    </div>

                    <div class="main-menu d-none d-lg-block">
                        <nav style="width: 700px;">
                            <div class="input-group mb-3 form-outline-primary">

                                <select class="rounded" style="width:175px; padding-left: 10px;" id="basicSearchSelect">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $catrs = Database::select("SELECT * FROM `category`;");
                                    $catn = $catrs->num_rows;
                                    for ($i = 0; $i < $catn; $i++) {
                                        $catr = $catrs->fetch_assoc();

                                    ?>
                                        <option value="<?php echo $catr["id"] ?>"><?php echo $catr["name"] ?></option>
                                    <?php
                                    }

                                    ?>
                            </div>
                            <input type="search" class="form-control placeholder-placeholder-wave" placeholder="Search" id="basicSearchTxt" aria-label="Text input with dropdown button">
                            <button id="search-button" type="button" class="btn btn-primary" onclick="basicSearch(1)">
                                <i class="bi bi-search"></i>
                            </button>
                    </div>
                    </nav>
                </div>

                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li>
                            <a class="ms-4 text-decoration-none  text-dark" style="font-size:25px;" href="watchList.php"><i class="bi bi-suit-heart"></i></a>
                        </li>

                        <li><a class="ms-4 text-decoration-none  text-dark" style="font-size:25px;" href="userProfile.php"><i class="bi bi-person"></i></a></li>
                        <a class="ms-4 text-decoration-none  text-dark" style="font-size:25px;" href="cart.php"><i class="bi bi-cart2"></i></a>


                    </ul>
                </div>
            </div>


            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>
        </div>
    </div>

    </div>


</body>

</html>