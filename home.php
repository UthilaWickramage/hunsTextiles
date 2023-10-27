<?php
session_start();
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="./resources/logo.svg">
   <title>Home</title>
   <link rel="stylesheet" href="home.css">
   <link rel="stylesheet" href="page-speed.css">
   <link rel="stylesheet" href="bootstrap.css">
   <link rel="stylesheet" href="vendor.css">
   <link rel="stylesheet" href="main.css">


   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <!--stylesheet------------->
   <link rel="stylesheet" type="text/css" href="style.css">
   <!--light-slider.css------------->
   <link rel="stylesheet" type="text/css" href="lightslider.css">
   <!--Jquery-------------------->
   <script type="text/javascript" src="jquery.js"></script>
   <!--lightslider.js--------------->
   <script type="text/javascript" src="lightslider.js"></script>

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

<body onload="subscribe()">


   <?php
   require "./components/header.php";

   ?>

<a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
   <div class="row" id="productDetails">
      <div class="col-12">
         <div class="row">
            <div class="col-12">
               <div class="header-bottom text-center bg-black py-2">
                  <p class=" text-white">Sale Up To 50% Biggest Discounts. Hurry! Limited Perriod Offer <a class="text-decoration-none" href="#" class="browse-btn">Shop Now</a></p>
               </div>
            </div>
         </div>
         <div class="sec-banner bg0 p-t-80 p-b-50">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

                     <div class="block1 shadow wrap-pic-w" style="height: 300px;">
                        <img src="./resources/xbanner-01.jpg.pagespeed.ic.Uj5FE94mgU.png" alt="IMG-BANNER">
                        <a href="productsGrid.php?c_id=1" id="seeAllLink1" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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

                     <div class="block1 shadow wrap-pic-w" style="height: 300px;">
                        <img src="./resources/xbanner-02.jpg.pagespeed.ic.MQuZq6F18q.png" alt="IMG-BANNER">
                        <a href="productsGrid.php?c_id=2" id="seeAllLink1" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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

                     <div class="block1 shadow wrap-pic-w" style="height: 300px;">
                        <img src="./resources/boy-crop.png" alt="IMG-BANNER">
                        <a href="productsGrid.php?c_id=3" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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
                  <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                     <div class="block1 shadow wrap-pic-w" style="height: 300px;">
                        <img src="./resources/xbanner-03.jpg.pagespeed.ic.1rqLomOaMb.png" alt="IMG-BANNER">
                        <a href="productsGrid.php?c_id=5" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                           <div class="block1-txt-child1 flex-col-l">
                              <span class="block1-name ltext-102 trans-04 p-b-8">
                                 Caps & Hats
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
                     <div class="block1 shadow" style="height: 300px;">
                        <div class="text-end ">
                           <img src="./resources/7548d779ec90e44c7195148cb7af973798c23a0e.png" height="300px" width="auto" alt="IMG-BANNER">
                        </div>

                        <a href="productsGrid.php?c_id=6" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                           <div class="block1-txt-child1 flex-col-l">
                              <span class="block1-name ltext-102 trans-04 p-b-8">
                                 Watches
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
                  <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto ">
                     <div class="block1 shadow" style="height: 300px;">
                        <div class="text-end pt-5 mt-5">
                           <img src="./resources/419075A57-PAIR-1500-removebg-preview1.png" height="200px" width="auto" alt="IMG-BANNER">
                        </div>

                        <a href="productsGrid.php?c_id=7" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                           <div class="block1-txt-child1 flex-col-l">
                              <span class="block1-name ltext-102 trans-04 p-b-8">
                                 Shoes
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
                     <div class="block1 shadow" style="height: 300px;">
                        <div class="text-end pt-5 ">
                           <img src="./resources/images-_1_.png" height="250px" width="auto" alt="IMG-BANNER">
                        </div>

                        <a href="productsGrid.php?c_id=4" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                           <div class="block1-txt-child1 flex-col-l">
                              <span class="block1-name ltext-102 trans-04 p-b-8">
                                 Bags
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
                     <div class="block1 shadow" style="height: 300px;">
                        <div class="text-center pt-5 mt-5 ms-5">
                           <img src="./resources/41OVdkJPgVL.jpg" height="200px" width="auto" alt="IMG-BANNER">
                        </div>

                        <a href="productsGrid.php?c_id=9" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                           <div class="block1-txt-child1 flex-col-l">
                              <span class="block1-name ltext-102 trans-04 p-b-8">
                                 Toys
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
                     <div class="block1 shadow" style="height: 300px;">
                        <div class="text-center pt-5">
                           <img src="./resources/w2500__1_-removebg-preview.png" height="250px" width="auto" alt="IMG-BANNER">
                        </div>

                        <a href="productsGrid.php?c_id=8" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                           <div class="block1-txt-child1 flex-col-l">
                              <span class="block1-name ltext-102 trans-04 p-b-8">
                                 Other Accesories
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


         <div class="p-2 mb-4 rounded-3 my-jumbotron d-none d-lg-block" style="background-color: bisque;">
            <div class="container-fluid py-5">
               <div class="row d-flex align-items-center">
                  <div class="col-6 offset-1 d-none d-lg-block">
                     <img src="./resources/419075A57-PAIR-1500-removebg-preview1.png" alt="" height="350px" width="auto">
                  </div>
                  <div class="col-lg-5 col-12">
                     <h1 class="display-4 text-dark fw-bold mb-2">NEW SHOES</h1>
                     <p class="fs-3 mb-3">#NEW SUMMER COLLECTION 2021</p>
                     <a class="btn btn-outline-dark btn-lg" href="productsGrid.php?c_id=7" type="button">Shop Now</a>
                  </div>

               </div>

            </div>
         </div>


         <div class="container-fluid">
            <div class="row">
               <div class="col-12 mt-3 mb-3">
                  <div class="row text-center">
                     <h1 class="text-black-50 text-uppercase">Latest Products</h1>
                  </div>
               </div>
               <?php
               $prors = Database::select("SELECT * FROM `product` WHERE `status_id`=1 ORDER BY `datetime_added` DESC LIMIT 8");
               $pronum = $prors->num_rows;
               ?>
               <?php
               for ($i = 0; $i < $pronum; $i++) {
                  $profr = $prors->fetch_assoc();
               ?>
                  <div class="col-9 offset-3 offset-lg-0 col-lg-3">

                     <div class="box">

                        <?php
                        $imgrs = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $profr["id"] . "'");
                        $imgfr = $imgrs->fetch_assoc();
                        ?>
                        <!--img-box---------->
                        <div class="slide-img" style="height: 350px;">
                           <img alt="1" src="<?php echo $imgfr["code"] ?>">
                           <!--overlayer---------->
                           <div class="overlay">
                              <!--buy-btn------>
                              <a href="<?php echo "singleProductView.php?pid=" . ($profr["id"]); ?>" class="buy-btn">Buy Now</a>
                           </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box" style="height: 100px;">
                           <!--type-------->
                           <div class="type">
                              <a href="#"><?php echo $profr["title"] ?></a>
                              <?php
                              $brs = Database::select("SELECT * FROM `brand` WHERE `id` = '" . $profr["brand_id"] . "'");
                              $bfr = $brs->fetch_assoc();
                              ?>
                              <span><?php echo $bfr["name"] ?></span>
                              <?php
                              if ($profr["qty"] == 0) {
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
                           <a href="#" class="price">Rs. <?php echo $profr["price"] ?></a>

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




   <?php
   require "./components/footer.php";
   ?>
   <div class="spinner-bg" id="customSpinner">
        <div class="spinner-border text-white border-5 " style="width: 5rem; height: 5rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
   </div>
   <!-- Button trigger modal -->
   
   <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content bg-dark">
            <div class="modal-body">

               <div class="col-12">
                  <div class="row">
                     <div class="col-4 modImg"></div>
                     <div class="col-8">
                        <div class="row d-flex justify-content-end">
                           <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <div class="row">
                           <div class="col-12 text-center">
                              <h5 class="modal-title text-uppercase fs-4 text-light" id="exampleModalLabel">Subscribe</h5>
                           </div>
                           <div class="col-12 mt-3 text-center">
                              <h3 class="text-uppercase text-light fs-2" style="font-family: 'Dancing Script', cursive;">DOnt Miss out</h3>
                           </div>
                           <div class="col-12 mt-3 text-center">
                              <h6 class="text-uppercase text-light ">Subscribe and get updates about the new arrivals</h6>
                           </div>
                           <div class="col-12 mt-3 text-center">
                              <div class="input-group mb-3">
                                 <input type="text" class="form-control bg-dark btn-outline-danger text-white" id="subemail" placeholder="Email Address">
                                 <button class="btn btn-danger text-uppercase" type="button" id="button-addon2" onclick="subscribeToUs()">Subscribe</button>
                              </div>
                           </div>
                           <div class="col-12 mt-3 text-center">
                              <h6 type="button" data-bs-dismiss="modal" class="text-uppercase text-danger ">Nah, I'm Good</h6>
                           </div>
                           <div class="col-12 mt-3">
                              <p class="text-center fs-6 text-uppercase text-white-50 "> &copy; 2021 HunsTextiles.store All Rights Reserved</p>
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
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   

</body>

</html>