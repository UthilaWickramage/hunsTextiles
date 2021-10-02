<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="../styles/page-speed.css">
    <link rel="stylesheet" href="../styles/bootstrap.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="header-area bg-dark">
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
                                    <li><a class="text-decoration-none" href="#">My Wishlist</a></li>
                                    <?php
                                    if (isset($_SESSION["user"])) {
                                        $user = $_SESSION["user"];


                                        $full_name =  $user["fname"] . ' ' . $user["lname"];
                                    ?>


                                        <li><a class="text-decoration-none" href="account.php"><?php echo $full_name; ?></a></li>
                                    <?php
                                    } else {
                                        $full_name = "Sign In / Register";
                                    ?>
                                        <li><a class="text-decoration-none" href="auth.php"><?php echo $full_name; ?></a></li>
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
                        <a href="index.html"><img src="./resources/logoemail.png" height="75px" width="auto" alt="" data-pagespeed-url-hash="436952282" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                    </div>

                    <div class="main-menu d-none d-lg-block">
                        <nav style="width: 700px;">
                            <div class="input-group mb-3 form-outline-primary">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Category</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Women's Wear</a>
                                    <a class="dropdown-item" href="#">Men's Wear</a>
                                    <a class="dropdown-item" href="#">Kid's Wear</a>
                                    <a class="dropdown-item" href="#">
                                        Accesories
                                    </a>
                                </div>
                                <input type="search" class="form-control placeholder-placeholder-wave" placeholder="Search" aria-label="Text input with dropdown button">
                                <button id="search-button" type="button" class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </nav>
                    </div>

                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li>
                                <a class="ms-4 text-decoration-none  text-dark" style="font-size:25px;" href=""><i class="bi bi-suit-heart"></i></a>
                            </li>

                            <li><a class="ms-4 text-decoration-none  text-dark" style="font-size:25px;" href=""><i class="bi bi-person"></i></a></li>
                            <li><a class="ms-4 text-decoration-none  text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="font-size:25px;" href=""><i class="bi bi-cart2"></i></a></li>
                           

                        </ul>
                    </div>
                </div>


                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>

    </div>

    <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>