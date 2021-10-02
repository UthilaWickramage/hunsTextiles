<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="icon" href="./resources/logo2.svg">
    <link rel="stylesheet" href="./styles/product_details.css">
    <link rel="stylesheet" href="./styles/page-speed.css">
    <link rel="stylesheet" href="./styles/bootstrap.css">
    <link rel="stylesheet" href="./styles/vendor.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--stylesheet------------->

    <!--light-slider.css------------->
    <link rel="stylesheet" type="text/css" href="./styles/lightslider.css">


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
            border: 1px solid whitesmoke;
            border-radius: 50%;
        }

        .cardImgTop {
            height: 275px;
            width: 223px;
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

    <div class="row mt-4">
        <div class="col-9 offset-1">
            <button class="btn btn-danger" id="go-back">
                Go Back to Product page
            </button>
        </div>
    </div>

    <div class="container mt-3 p-3">
        <div class="row">
            <div class="col-12 card p-5">
                <div class="row">
                    <div class="col-4" data-zoom data-zoom-max="1" id="imageContainer">
                        <img src="./resources/xproduct-2.jpg.pagespeed.ic.G95CPgnz75.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-6">
                        <h3 class="mb-2">Grey Color Women Dress | Dress | Armani | Summer Clothes | Party Dress</h3>
                        <p>H&M</p>
                        <hr>
                        <h5 class="text-black-50">Grey Women Party Dress</h5>
                        <h3 class="mt-2 mb-3"><b>Rs. 4500.00</b> <span style="font-size: 16px; opacity: 0.5;">+Rs. 200.00 (shipping cost)</span> </h3>
                        <h6>Category : <span class="text-primary">Women's Wear</span></h6>
                        <h6>Availibility : <span class="text-warning">In Stock</span></h6>
                        <p class="mt-3">Product text includes any content that is used to describe a product. Product descriptions are the most common
                            example, but there are other forms of this kind of text that include advertorials, blog posts,
                            and reviews. The ultimate goal of such texts is to sell more of the product being featured in it.
                        </p>
                        <div class="row mt-3">
                            <div class="col-2 mt-1">
                                <h6>Color :</h6>
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
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 mt-2">
                                <h6>Size :</h6>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm">
                                    <option value="">Extra Large</option>
                                    <option value="">Large</option>
                                    <option value="">Medium</option>
                                    <option value="">Small</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-2 mt-1">
                                <p class="d-inline">Quantity:
                            </div>
                            <div class="col-2">
                                <span><input type="number" min=1 id="sst" maxlength="12" value="1" class="form-control"></span>
                            </div>
                            <div class="col-8">
                                <button type="button" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Add to Cart</button>
                                <button class="btn btn-danger">Add to Wishlist</button>
                            </div>
                            <div class="col-10 d-grid mt-3">
                                <button class="btn btn-primary">
                                    Buy Now
                                </button>
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <img src="./admin//uploads/613f9ab23dd26.png" height="75" width="auto" alt="">
                            </div>
                            <div class="col-12 mt-3 text-center">
                                <p><b>Shop address :</b></p>
                                <p>Maradana, Colombo 10, Sri Lanka</p>
                            </div>
                            <div class="col-12 mt-3 text-center">
                                <p><b>Shipping Details :</b></p>
                                <p>Greater Colombo</p>
                                <p>Ship from Overseas</p>
                                <p>Will take 6-9 days</p>
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
                <div class="row">
                    <div class="col-12">
                        <div class="row p-3">
                            <div class="col-6">
                                <h5 class="card-header bg-primary text-white">Reviews</h5>
                                <div class="shadow p-3 mb-5 bg-light rounded mt-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="card-title"><b>Special title treatment</b></p>
                                            <a href="#" class="btn btn-primary">Reply</a>
                                        </div>
                                        <p><b> 2021-09-22 22:45:12</b></p>
                                        <p class="card-text mt-2">Product text includes any content that is used to describe a product.
                                            Product descriptions are the most common example,
                                            but there are other forms of this kind of text that include advertorials, blog posts, and reviews.</p>

                                    </div>
                                    <div class="row">

                                        <div class="col-10 ">
                                            <div class="shadow-sm p-3 mb-5 bg-light rounded mt-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="text-lg-center"><b>Special title treatment</b></p>

                                                    </div>
                                                    <p class="mt-2"><small> Product text includes any content that is used to describe a product.
                                                        </small></p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 mt-5">
                                            <i class=" me-5 bi bi-reply-fill" style="font-size: 36px;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow p-3 mb-5 bg-light rounded mt-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="card-title"><b>Special title treatment</b></p>
                                            <a href="#" class="btn btn-primary">Reply</a>
                                        </div>
                                        <p><b> 2021-09-22 22:45:12</b></p>
                                        <p class="card-text mt-2">Product text includes any content that is used to describe a product.
                                            Product descriptions are the most common example,
                                            but there are other forms of this kind of text that include advertorials, blog posts, and reviews.</p>

                                    </div>
                                    
                                </div>
                                <div class="shadow p-3 mb-5 bg-light rounded mt-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="card-title"><b>Special title treatment</b></p>
                                            <a href="#" class="btn btn-primary">Reply</a>
                                        </div>
                                        <p><b> 2021-09-22 22:45:12</b></p>
                                        <p class="card-text mt-2">Product text includes any content that is used to describe a product.
                                            Product descriptions are the most common example,
                                            but there are other forms of this kind of text that include advertorials, blog posts, and reviews.</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="card-header bg-warning text-white">Comments</h5>
                                <div class="shadow p-3 mb-5 bg-light rounded mt-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="card-title"><b>Special title treatment</b></p>
                                            <a href="#" class="btn btn-warning text-light">Reply</a>
                                        </div>
                                        <p><b> 2021-09-22 22:45:12</b></p>
                                        <p class="card-text mt-2">Product text includes any content that is used to describe a product.
                                            Product descriptions are the most common example,
                                            but there are other forms of this kind of text that include advertorials, blog posts, and reviews.</p>

                                    </div>
                                </div>
                                <div class="shadow p-3 mb-5 bg-light rounded mt-3 pb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="card-title"><b>Special title treatment</b></p>
                                            <a href="#" class="btn btn-warning text-light">Reply</a>
                                        </div>
                                        <p><b> 2021-09-22 22:45:12</b></p>
                                        <p class="card-text mt-2">Product text includes any content that is used to describe a product.
                                            Product descriptions are the most common example,
                                            but there are other forms of this kind of text that include advertorials, blog posts, and reviews.</p>

                                    </div>
                                    <div class="row">
                                        <div class="col-2 mt-5">
                                            <i class=" ms-5 bi bi-reply-fill" style="font-size: 36px;"></i>
                                        </div>
                                        <div class="col-10 ">
                                            <div class="shadow-sm p-3 mb-5 bg-light rounded mt-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="text-lg-center"><b>Special title treatment</b></p>

                                                    </div>
                                                    <p class="mt-2"><small> Product text includes any content that is used to describe a product.
                                                        </small></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow p-3 mb-5 bg-light rounded mt-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="card-title"><b>Special title treatment</b></p>
                                            <a href="#" class="btn btn-warning text-light">Reply</a>
                                        </div>
                                        <p><b> 2021-09-22 22:45:12</b></p>
                                        <p class="card-text mt-2">Product text includes any content that is used to describe a product.
                                            Product descriptions are the most common example,
                                            but there are other forms of this kind of text that include advertorials, blog posts, and reviews.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 card px-5 py-4 mt-5">
                <div class="row">
                    <div class="col-12 ">
                        <a class="link-dark heading-link-1" style="font-size: 35px;" href="#">Related Products</a>
                        <a class="link-dark see-all-link" href="#">See All &rarr;</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-3 d-flex justify-content-center">
                        <div class="card" style="width: 15rem;">
                            <div class="zoomcard hov-img0 block2-pic cardImgTop">
                                <img src="./resources/xproduct-13.jpg.pagespeed.ic.jIjGx2QblE.png" class="card-img-top" alt="...">
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
                    <div class="col-3 d-flex justify-content-center">
                        <div class="card" style="width: 15rem;">
                            <div class="zoomcard hov-img0 block2-pic  cardImgTop">
                                <img src="./resources/xproduct-6.jpg.pagespeed.ic.cSjqAX05pL.png" class="card-img-top" alt="...">
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
                    <div class="col-3 d-flex justify-content-center">
                        <div class="card" style="width: 15rem;">
                            <div class="zoomcard hov-img0 block2-pic cardImgTop">
                                <img src="./resources/xproduct_11.jpg.pagespeed.ic.k2tGjLCUxj.png" class="card-img-top" alt="...">
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
                    <div class="col-3 d-flex justify-content-center">
                        <div class="card" style="width: 15rem;">
                            <div class="zoomcard hov-img0 block2-pic cardImgTop">
                                <img src="./resources/xproduct-2.jpg.pagespeed.ic.G95CPgnz75.png" class="card-img-top" alt="...">
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
                </div>
            </div>


        </div>
    </div>
    </div>
    </div>

    <?php
    require "./components/footer.php";

    ?>
    <?php
    require "./components/cartModal.php"
    ?>

    <script>
        document.getElementById('go-back').addEventListener('click', () => {
            history.back();
        });
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
    <script src="./js/zoom.js"></script>
    <script src="https://preview.colorlib.com/theme/karma/js/jquery.magnific-popup.min.js+owl.carousel.min.js.pagespeed.jc.uzdaTXytfs.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/classy.nav.js"></script>
    <script type="text/javascript" src="./js/text.js"></script>
</body>

</html>