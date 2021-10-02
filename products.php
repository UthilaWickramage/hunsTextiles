<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>
    <link rel="icon" href="./resources/logo2.svg">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/page-speed.css">
    <link rel="stylesheet" href="./styles/bootstrap.css">
    <link rel="stylesheet" href="./styles/vendor.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--stylesheet------------->

    <!--light-slider.css------------->
    <link rel="stylesheet" type="text/css" href="./styles/lightslider.css">
    <link rel="stylesheet" type="text/css" href="./styles/linearicons.css">
    <link rel="stylesheet" type="text/css" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/product.css">
    <!--Jquery-------------------->
    <script type="text/javascript" src="./js/jquery.js"></script>
    <!--lightslider.js--------------->
    <script type="text/javascript" src="./js/lightslider.js"></script>

    <style>
        .color-circle {
            display: inline-block;
            height: 25px;
            width: 25px;
            border:1px solid whitesmoke;
            border-radius: 50%;
        }

        .cardImg {
            height: 333px;
            width: auto;
           overflow: hidden;
        }

        #goToTopBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
            width: 50px;
        }
    </style>
</head>

<body style="overflow-x: hidden;">
    <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
    <?php
    require "./components/header.php";

    ?>

    <div class="row">
        <div class="col-10 offset-1">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5 mt-5">
                    <div class="sidebar-categories">
                        <div class="head">Browse Categories</div>
                        <ul class="main-categories">

                            <li class="main-nav-list "><a href="#">Women's Wear<span class="number">(35)</span></a></li>
                            <li class="main-nav-list"><a href="#">Men's Wear<span class="number">(17)</span></a></li>
                            <li class="main-nav-list"><a href="#">Kid's Wear<span class="number">(9)</span></a></li>
                            <li class="main-nav-list"><a href="#">Accesories<span class="number">(16)</span></a></li>

                        </ul>
                    </div>
                    <div class="sidebar-categories mt-4">
                        <div class="head">Browse Product Features</div>
                        <ul class="main-categories">

                            <li class="main-nav-list "><a href="#">Denims<span class="number">(35)</span></a></li>
                            <li class="main-nav-list"><a href="#">Blouses<span class="number">(17)</span></a></li>
                            <li class="main-nav-list"><a href="#">Frocks<span class="number">(9)</span></a></li>
                            <li class="main-nav-list"><a href="#">Shorts<span class="number">(16)</span></a></li>

                        </ul>
                    </div>
                    <div class="sidebar-categories mt-4">
                        <div class="head">Color</div>
                        <div class="row mt-2">
                            <div class="col-1">
                                <div class="color-circle" style="background-color: white;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: whitesmoke;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: yellow;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: DeepPink;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: DarkMagenta;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: CornflowerBlue;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: DarkBlue;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: Crimson;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color:Chartreuse;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: lime;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: LightSeaGreen;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: Navy;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: Orange;">

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="color-circle" style="background-color: black;">

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="sidebar-filter mt-50 ">
                        <div class="top-filter-head">Product Filters</div>
                        <div class="main-categories">
                            <div class="common-filter">
                                <div class="head">Brands</div>

                                <ul>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
                                </ul>

                            </div>
                            <div class="common-filter">
                                <div class="head">Sizes</div>

                                <ul class="list-group list-group-flush">
                                    <li class="filter-list list-group-item"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">X Extra Large</label></li>
                                    <li class="filter-list list-group-item"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Extra Large</label></li>
                                    <li class="filter-list list-group-item"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Large</label></li>
                                    <li class="filter-list list-group-item"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Medium</label></li>
                                    <li class="filter-list list-group-item"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Small</label></li>
                                </ul>

                            </div>

                        </div>

                    </div>


                </div>

                <div class="col-9 mt-5">
                    <div class="card mb-4">
                        <header class="card-header ">
                            <div class="row gx-3">
                                <div class="col-lg-4 col-md-6 me-auto d-flex align-self-center">
                                    <h6 class="text-uppercase text-secondary pt-2">Showing 1 to 12 of 30 total</h6>
                                </div>
                                <div class="col-lg-4 col-md-6 me-auto">
                                    <select class="form-select">
                                        <option>Status</option>
                                        <option>Active</option>
                                        <option>Disabled</option>
                                        <option>Show all</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-3 col-6">
                                    <select class="form-select">
                                        <option>In Stock</option>
                                        <option>Out of Stock</option>
                                    </select>
                                </div>

                            </div>
                        </header> <!-- card-header end// -->
                    </div>
                    <div class="row gy-4">
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <div class="zoomcard hov-img0 block2-pic">
                                    <img src="./resources/xproduct-01.jpg.pagespeed.ic.6WHvZRJRuO.png" class="card-img-top cardImgTop" alt="...">
                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-dark">Esprit Ruffle Shirt</h5>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="card-text text-warning">In Stock</span>
                                        <p>Rs. 1250.00</p>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control" value="1">
                                        <a href="#" class="link-secondary ms-2" onclick="addCartIcon()"><i class="bi bi-cart" style="font-size: 24px;"></i></a>
                                        <a href="#" class="link-danger ms-2" onclick="checkWishlist()"><i class="bi bi-suit-heart" style="font-size: 24px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <div class="zoomcard hov-img0 block2-pic">
                                    <img src="./resources/xproduct-11.jpg.pagespeed.ic.fJxJBqHZzv.png" class="card-img-top cardImgTop" alt="...">
                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-dark">Esprit Ruffle Shirt</h5>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="card-text text-warning">In Stock</span>
                                        <p>Rs. 1250.00</p>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control" value="1">
                                        <a href="#" class="link-secondary ms-2" onclick="addCartIcon()"><i class="bi bi-cart" style="font-size: 24px;"></i></a>
                                        <a href="#" class="link-danger ms-2" onclick="checkWishlist()"><i class="bi bi-suit-heart" style="font-size: 24px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <div class="zoomcard hov-img0 block2-pic">
                                    <img src="./resources/xproduct-16.jpg.pagespeed.ic.AbLwZITYaU.png" class="card-img-top cardImgTop" alt="...">
                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-dark">Esprit Ruffle Shirt</h5>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="card-text text-warning">In Stock</span>
                                        <p>Rs. 1250.00</p>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control" value="1">
                                        <a href="#" class="link-secondary ms-2" onclick="addCartIcon()"><i class="bi bi-cart" style="font-size: 24px;"></i></a>
                                        <a href="#" class="link-danger ms-2" onclick="checkWishlist()"><i class="bi bi-suit-heart" style="font-size: 24px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <div class="zoomcard hov-img0 block2-pic">
                                    <img src="./resources/xproduct-13.jpg.pagespeed.ic.jIjGx2QblE.png" class="card-img-top cardImgTop" alt="...">
                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-dark">Esprit Ruffle Shirt</h5>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="card-text text-warning">In Stock</span>
                                        <p>Rs. 1250.00</p>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control" value="1">
                                        <a href="#" class="link-secondary ms-2" onclick="addCartIcon()"><i class="bi bi-cart" style="font-size: 24px;"></i></a>
                                        <a href="#" class="link-danger ms-2" onclick="checkWishlist()"><i class="bi bi-suit-heart" style="font-size: 24px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <div class="zoomcard hov-img0 block2-pic">
                                    <img src="./resources/xproduct-08.jpg.pagespeed.ic.zcR_ZfXlFq.webp" class="card-img-top cardImgTop" alt="...">
                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-dark">Esprit Ruffle Shirt</h5>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="card-text text-warning">In Stock</span>
                                        <p>Rs. 1250.00</p>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control" value="1">
                                        <a href="#" class="link-secondary ms-2" onclick="addCartIcon()"><i class="bi bi-cart" style="font-size: 24px;"></i></a>
                                        <a href="#" class="link-danger ms-2" onclick="checkWishlist()"><i class="bi bi-suit-heart" style="font-size: 24px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <div class="zoomcard hov-img0 block2-pic">
                                    <img src="./resources/xproduct-05.jpg.pagespeed.ic.GHcB3Nc9zp.png" class="card-img-top cardImgTop" alt="...">
                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-dark">Esprit Ruffle Shirt</h5>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="card-text text-warning">In Stock</span>
                                        <p>Rs. 1250.00</p>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control" value="1">
                                        <a href="#" class="link-secondary ms-2" onclick="addCartIcon()"><i class="bi bi-cart" style="font-size: 24px;"></i></a>
                                        <a href="#" class="link-danger ms-2" onclick="checkWishlist()"><i class="bi bi-suit-heart" style="font-size: 24px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <div class="zoomcard hov-img0 block2-pic">
                                    <img src="./resources/xproduct-03.jpg.pagespeed.ic.eOHs429Gtb.png" class="card-img-top cardImgTop" alt="...">
                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-dark">Esprit Ruffle Shirt</h5>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="card-text text-warning">In Stock</span>
                                        <p>Rs. 1250.00</p>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control" value="1">
                                        <a href="#" class="link-secondary ms-2" onclick="addCartIcon()"><i class="bi bi-cart" style="font-size: 24px;"></i></a>
                                        <a href="#" class="link-danger ms-2" onclick="checkWishlist()"><i class="bi bi-suit-heart" style="font-size: 24px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <div class="zoomcard hov-img0 block2-pic">
                                    <img src="./resources/xproduct-10.jpg.pagespeed.ic.JKjq4oUn3E.png" class="card-img-top cardImgTop" alt="...">
                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-dark">Esprit Ruffle Shirt</h5>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="card-text text-warning">In Stock</span>
                                        <p>Rs. 1250.00</p>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control" value="1">
                                        <a href="#" class="link-secondary ms-2" onclick="addCartIcon()"><i class="bi bi-cart" style="font-size: 24px;"></i></a>
                                        <a href="#" class="link-danger ms-2" onclick="checkWishlist()"><i class="bi bi-suit-heart" style="font-size: 24px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex">
                        <div class="card" style="width: 18rem;" >
                            <div class="zoomcard hov-img0 block2-pic cardImg">
                                <img src="./resources/xproduct-2.jpg.pagespeed.ic.G95CPgnz75.png" class="card-img-top " style=" background-size: cover;" alt="...">
                                <a href="product_details.php" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title text-dark">Esprit Ruffle Shirt</h5>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="card-text text-warning">In Stock</span>
                                    <p>Rs. 1250.00</p>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <input type="number" class="form-control" value="1">
                                    <a href="#" class="link-secondary ms-2" onclick="addCartIcon()"><i class="bi bi-cart" style="font-size: 24px;"></i></a>
                                    <a href="#" class="link-danger ms-2" onclick="checkWishlist()"><i class="bi bi-suit-heart" style="font-size: 24px;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>

            </div>

            <div class="row mt-5 mb-5">
                <div class="col-7 offset-4">
                    <nav>
                        <ul class="pagination1 justify-content-center">
                            <li class="page-item1 disabled">
                                <a class="page-link1">Previous</a>
                            </li>
                            <li class="page-item1 active"><a class="page-link1" href="#">1</a></li>
                            <li class="page-item1"><a class="page-link1" href="#">2</a></li>
                            <li class="page-item1"><a class="page-link1" href="#">3</a></li>
                            <li class="page-item1">
                                <a class="page-link1" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>


    </div>

    <?php
    require "./components/footer.php";

    ?>
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
    <script src="https://preview.colorlib.com/theme/karma/js/jquery.magnific-popup.min.js+owl.carousel.min.js.pagespeed.jc.uzdaTXytfs.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/classy.nav.js"></script>
    <script type="text/javascript" src="./js/text.js"></script>

</body>

</html>