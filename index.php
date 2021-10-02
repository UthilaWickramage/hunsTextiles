<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./resources/logo2.svg">
    <title>Home</title>
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/page-speed.css">
    <link rel="stylesheet" href="./styles/bootstrap.css">
    <link rel="stylesheet" href="./styles/vendor.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--stylesheet------------->
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <!--light-slider.css------------->
    <link rel="stylesheet" type="text/css" href="./styles/lightslider.css">
    <!--Jquery-------------------->
    <script type="text/javascript" src="./js/jquery.js"></script>
    <!--lightslider.js--------------->
    <script type="text/javascript" src="./js/lightslider.js"></script>

    <style>
     
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

<body style="font-family:'calibri'; overflow-x:hidden">
    <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
    <header>
        <?php
        require "./components/header.php";
        ?>
    </header>
    <div class="row">
        <div class="col-12">
            <div class="header-bottom text-center bg-black p-2">
                <p class=" text-white">Sale Up To 50% Biggest Discounts. Hurry! Limited Perriod Offer <a class="text-decoration-none" href="#" class="browse-btn">Shop Now</a></p>
            </div>
        </div>
    </div>



    <div id="carouselExampleFade" class="carousel slide carousel-fade d-none d-lg-block" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active captionImage">
                <img src="./resources/girls-edit.png" class="d-block w-100 " alt="...">

                <div class="carousel-caption d-none d-md-block posterCaption">
                    <h5 class="postertitle">Shop With Us</h5>
                    <p class="postertext">The World's Best Online Store By One Click.</p>
                    <a href="" class="btn btn-lg btn-light">Shop Now</a>
                </div>
            </div>
            <div class="carousel-item captionImage">
                <img src="./resources/tux-edit.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block posterCaption">

                    <h5 class="postertitle">Men's Wear</h5>
                    <p class="postertext">See New Arrivals.</p>
                    <a href="" class="btn btn-lg btn-light">Check Now</a>
                </div>
            </div>
            <div class="carousel-item captionImage">
                <img src="./resources/women-edit.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block posterCaption">
                    <h5 class="postertitle">Women's Wear</h5>
                    <p class="postertext">See New Arrivals.</p>
                    <a href="" class="btn btn-lg btn-light">Check Now</a>
                </div>
            </div>

            <div class="carousel-item captionImage">
                <img src="./resources/discount-edit.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

                    <div class="block1 wrap-pic-w">
                        <img src="./resources/xbanner-01.jpg.pagespeed.ic.Uj5FE94mgU.png" alt="IMG-BANNER">
                        <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Women's
                                </span>
                                <span class="block1-info stext-102 trans-04">
                                    New Products Available
                                </span>
                            </div>
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

                    <div class="block1 wrap-pic-w">
                        <img src="./resources/xbanner-02.jpg.pagespeed.ic.MQuZq6F18q.png" alt="IMG-BANNER">
                        <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Men's
                                </span>
                                <span class="block1-info stext-102 trans-04">
                                    New Products Available
                                </span>
                            </div>
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

                    <div class="block1 wrap-pic-w">
                        <img src="./resources/boy-crop.png" alt="IMG-BANNER">
                        <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Kid's
                                </span>
                                <span class="block1-info stext-102 trans-04">
                                    New Products Available
                                </span>
                            </div>
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <a class="link-dark heading-link-1" style="font-size: 35px;" href="#">Popular Products</a>
                <a class="link-dark see-all-link" href="#">See All &rarr;</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">


        <section class="slider">
            <ul id="autoWidth" class="cs-hidden">
                <!--1------------------------------------>
                <li class="item-a">
                    <!--box-slider--------------->
                    <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                            <img alt="1" src="./resources/xproduct-05.jpg.pagespeed.ic.GHcB3Nc9zp.png">
                            <!--overlayer---------->
                            <div class="overlay">
                                <!--buy-btn------>
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                            <!--type-------->
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a>
                                <span>Noe Arrival</span>
                                <span class="card-text text-warning">In Stock</span>
                            </div>
                            <!--price-------->
                            <a href="#" class="price">$23</a>

                        </div>

                    </div>
                </li>
                <!--3------------------------------------>
                <li class="item-c">
                    <!--box-slider--------------->
                    <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                            <img alt="3" src="./resources/xproduct-10.jpg.pagespeed.ic.JKjq4oUn3E.png">
                            <!--overlayer---------->
                            <div class="overlay">
                                <!--buy-btn------>
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                            <!--type-------->
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a>
                                <span>Noe Arrival</span>
                                <span class="card-text text-warning">In Stock</span>
                            </div>
                            <!--price-------->
                            <a href="#" class="price">$26</a>

                        </div>

                    </div>
                </li>
                <!--4------------------------------------>
                <li class="item-d">
                    <!--box-slider--------------->
                    <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                            <img alt="4" src="./resources/xproduct-16.jpg.pagespeed.ic.AbLwZITYaU.png">
                            <!--overlayer---------->
                            <div class="overlay">
                                <!--buy-btn------>
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                            <!--type-------->
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a>
                                <span>Noe Arrival</span>
                                <span class="card-text text-warning">In Stock</span>
                            </div>
                            <!--price-------->
                            <a href="#" class="price">$27</a>

                        </div>

                    </div>
                </li>
                <!--5------------------------------------>
                <li class="item-e">
                    <!--box-slider--------------->
                    <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                            <img alt="5" src="./resources/xproduct-02.jpg.pagespeed.ic._mIojWDfEX.png">
                            <!--overlayer---------->
                            <div class="overlay">
                                <!--buy-btn------>
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                            <!--type-------->
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a>
                                <span>Noe Arrival</span>
                                <span class="card-text text-danger">Out of Stock</span>
                            </div>
                            <!--price-------->
                            <a href="#" class="price">$26</a>

                        </div>

                    </div>
                </li>
                <!--6------------------------------------>
                <li class="item-f">
                    <!--box-slider--------------->
                    <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                            <img alt="6" src="./resources/xproduct-03.jpg.pagespeed.ic.eOHs429Gtb.png">
                            <!--overlayer---------->
                            <div class="overlay">
                                <!--buy-btn------>
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                            <!--type-------->
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a>
                                <span>Noe Arrival</span>
                                <span class="card-text text-warning">In Stock</span>
                            </div>
                            <!--price-------->
                            <a href="#" class="price">$30</a>

                        </div>

                    </div>
                </li>
                <!--7------------------------------------>
                <li class="item-g">
                    <!--box-slider--------------->
                    <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                            <img alt="7" src="./resources/xproduct-08.jpg.pagespeed.ic.zcR_ZfXlFq.png">
                            <!--overlayer---------->
                            <div class="overlay">
                                <!--buy-btn------>
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                            <!--type-------->
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a>
                                <span>Noe Arrival</span>
                                <span class="card-text text-warning">In Stock</span>
                            </div>
                            <!--price-------->
                            <a href="#" class="price">$33</a>

                        </div>

                    </div>
                </li>
                <!--8------------------------------------>
                <li class="item-h">
                    <!--box-slider--------------->
                    <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                            <img alt="8" src="./resources/xproduct-13.jpg.pagespeed.ic.jIjGx2QblE.png">
                            <!--overlayer---------->
                            <div class="overlay">
                                <!--buy-btn------>
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                            <!--type-------->
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a>
                                <span>Noe Arrival</span>
                                <span class="card-text text-danger">Out of Stock</span>
                            </div>
                            <!--price-------->
                            <a href="#" class="price">$43</a>

                        </div>

                    </div>
                </li>

            </ul>
        </section>
    </div>

    <div class="p-2 mb-4 rounded-3 my-jumbotron" style="background-color: bisque;">
        <div class="container-fluid py-5">
            <div class="row d-flex align-items-center">
                <div class="col-6 offset-1 d-none d-lg-block">
                    <img src="./resources/419075A57-PAIR-1500-removebg-preview1.png" alt="" height="350px" width="auto">
                </div>
                <div class="col-lg-5 col-12">
                    <h1 class="display-4 text-dark fw-bold mb-2">NEW SHOES</h1>
                    <p class="fs-3 mb-3">#NEW SUMMER COLLECTION 2021</p>
                    <button class="btn btn-outline-dark btn-lg" type="button">Shop Now</button>
                </div>

            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 mb-5 mt-5">
                <a class="link-dark heading-link-1" style="font-size: 35px;" href="#">Latest Products</a>
                <a class="link-dark see-all-link" href="#">See All &rarr;</a>
            </div>
        </div>
    </div>

    <div class="container-fluid my-font">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="row mb-4 gy-3">

                    <div class="col-12 col-lg-4 col-md-6 col-xl-3">
                        <div class="card" style="width: 20rem;">
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
                    <div class="col-12 col-lg-4 col-md-6 col-xl-3">
                        <div class="card" style="width: 20rem;">
                            <div class="zoomcard hov-img0 block2-pic">
                                <img src="./resources/xproduct-02.jpg.pagespeed.ic._mIojWDfEX.png" class="card-img-top cardImgTop" alt="...">
                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Esprit Ruffle Shirt</h5>
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
                    <div class="col-12 col-lg-4 col-md-6 col-xl-3">
                        <div class="card" style="width: 20rem;">
                            <div class="zoomcard hov-img0 block2-pic">
                                <img src="./resources/xproduct-03.jpg.pagespeed.ic.eOHs429Gtb.png" class="card-img-top cardImgTop" alt="...">
                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Esprit Ruffle Shirt</h5>
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
                    <div class="col-12 col-lg-4 col-md-6 col-xl-3">
                        <div class="card" style="width: 20rem;">
                            <div class="zoomcard hov-img0 block2-pic">
                                <img src="./resources/xproduct-07.jpg.pagespeed.ic.wXz93SW1CF.png" class="card-img-top cardImgTop" alt="...">
                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Esprit Ruffle Shirt</h5>
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




                    <div class="col-12 col-lg-4 col-md-6 col-xl-3">
                        <div class="card" style="width: 20rem;">
                            <div class="zoomcard hov-img0 block2-pic">
                                <img src="./resources/xproduct-08.jpg.pagespeed.ic.zcR_ZfXlFq.webp" class="card-img-top cardImgTop" alt="...">
                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Esprit Ruffle Shirt</h5>
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
                    <div class="col-12 col-lg-4 col-md-6 col-xl-3">
                        <div class="card" style="width: 20rem;">
                            <div class="zoomcard hov-img0 block2-pic">
                                <img src="./resources/xproduct-10.jpg.pagespeed.ic.JKjq4oUn3E.png" class="card-img-top cardImgTop" alt="...">
                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Esprit Ruffle Shirt</h5>
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
                    <div class="col-12 col-lg-4 col-md-6 col-xl-3">
                        <div class="card" style="width: 20rem;">
                            <div class="zoomcard hov-img0 block2-pic">
                                <img src="./resources/xproduct-13.jpg.pagespeed.ic.jIjGx2QblE.png" class="card-img-top cardImgTop" alt="...">
                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Esprit Ruffle Shirt</h5>
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
                    <div class="col-12 col-lg-4 col-md-6 col-xl-3">
                        <div class="card" style="width: 20rem;">
                            <div class="zoomcard hov-img0 block2-pic">
                                <img src="./resources/xproduct-16.jpg.pagespeed.ic.AbLwZITYaU.png" class="card-img-top cardImgTop" alt="...">
                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 btn-danger p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Esprit Ruffle Shirt</h5>
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
    </div>

    <div class="p-2  rounded-3 text-dark my-jumbotron" style="background-color: grey;">
        <div class="container-fluid py-5 pe-5">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-5 offset-lg-2">
                    <h1 class="display-6 fw-bold mb-2">Subscribe to Our Newsletter</h1>
                    <p class="fs-4  mb-3">get the details about our latest products to your inbox</p>
                </div>
                <div class="col-12 col-lg-5  ">
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control  border-danger">
                                <a href="" class="btn btn-danger text-uppercase">Subscribe</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <?php
    require "./components/footer.php"
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
    <script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/classy.nav.js"></script>
    <script type="text/javascript" src="./js/text.js"></script>
</body>

</html>