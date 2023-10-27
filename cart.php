<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $uemail = $_SESSION["u"]["email"];

    $total = "0";
    $subTotal = "0";
    $shipping = "0";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Cart</title>
        <link rel="icon" href="./resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    </head>

    <body>
    <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
        <div class="container-fluid">
            <div class="row" >
                <?php
                require "./components/header.php";
                ?>
               <div class="col-12">
                   <div class="row" id="productDetails">
                   <div class="col-12 pt-2" style="background-color:#e3e5e4;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 border  border-1 border-secondary rounded mb-3">
                    <div class="row">
                        <div class="col-6 offset-3 offset-lg-0 col-lg-12">
                            <label class="form-label fs-1 fw-bolder text-uppercase">Shopping Cart <i class="bi bi-cart3"></i></label>
                        </div>
                        <div class="col-12 col-lg-6">
                            <hr>
                        </div>
                        
                        <div class="col-12">
                            <hr>
                        </div>

                        <?php
                        $cartrs = Database::select("SELECT * FROM `cart` WHERE `user_email`='" . $uemail . "'");
                        $cn = $cartrs->num_rows;

                        if ($cn == 0) {
                        ?>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptycart"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-2 fw-bold">Your Basket is Empty</label>
                                    </div>
                                    <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-4">
                                        <a href="home.php" class="btn btn-primary fs-6">Start Shopping</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12 col-lg-9 ">
                                <div class="row">
                                    <?php
                                    for ($i = 0; $i < $cn; $i++) {
                                        $cr = $cartrs->fetch_assoc();
                                        $productrs = Database::select("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "'");
                                        $productn = $productrs->num_rows;

                                        if ($productn == 1) {
                                            $productr = $productrs->fetch_assoc();
                                            $total = $total + ($productr["price"] * $cr["qty"]);

                                            $addressrs = Database::select("SELECT * FROM `user_has_address` WHERE `user_email`='" . $uemail . "'");
                                            $ar = $addressrs->fetch_assoc();
                                            $cityid = $ar["city_id"];
                                            $districtrs = Database::select("SELECT * FROM `city` WHERE `id` = '" . $cityid . "'");
                                            $xr = $districtrs->fetch_assoc();
                                            $districtid = $xr["district_id"];

                                            $ship = "0";

                                            if ($districtid == 1) {
                                                $ship = $productr["deliver_fee_colombo"];
                                                $shipping = $shipping + $productr["deliver_fee_colombo"];
                                            } else {
                                                $ship = $productr["deliver_fee_outside_colombo"];
                                                $shipping = $shipping + $productr["deliver_fee_outside_colombo"];
                                            }



                                            $brrs = Database::select("SELECT * FROM `brand` WHERE `id`='" . $productr["brand_id"] . "'");
                                            $brrn = $brrs->num_rows;

                                            if ($brrn == 1) {
                                                $bn = $brrs->fetch_assoc();
                                    ?>



                                                <div class="card mb-3 ms-2 col-12">
                                                    <div class="row g-0">
                                                        
                                                        <div class="col-12 mt-3 mb-3">
                                                            <div class="row">

                                                                <div class="col-12">
                                                                    <span class="fw-bold text-black-50 fs-5">Brand :</span>&nbsp;
                                                                    <span class="fw-bold text-black fs-5"><?php echo $bn["name"] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <?php
                                                        $imagers = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $productr["id"] . "'");
                                                        $in = $imagers->num_rows;

                                                        $arr;

                                                        for ($x = 0; $x < $in; $x++) {
                                                            $ir = $imagers->fetch_assoc();
                                                            $arr[$x] = $ir["code"];
                                                        }
                                                        ?>

                                                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                            
                                                            <img src="<?php echo $arr[0] ?>" style="height:200px; width:auto;" class="img-fluid rounded-start d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="<?php echo $productr["title"] ?>" data-bs-content="<?php echo $productr["description"] ?>">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $productr["title"] ?></h5>
                                                                <?php
                                                                $colorrs = Database::select("SELECT * FROM color WHERE id='" . $productr["color_id"] . "'");
                                                                $con = $colorrs->fetch_assoc();
                                                                ?>
                                                                <span class="fw-bold text-black-50">Color : <?php echo $con["name"] ?></span> &nbsp; |
                                                                
                                                                    &nbsp;<span class="fw-bold text-black-50">SKU No : <?php echo $productr["sku"]?></span>
                                                                

                                                                <br>
                                                                <span class="fw-bold text-black-50 fs-5"> Price : &nbsp;</span>
                                                                <span class="fs-5 text-black">Rs. <?php echo $productr["price"] ?>.00</span>
                                                                <br>
                                                                <span class="fw-bold text-black-50 fs-6">Quantity :</span>&nbsp;
                                                                <input type="number" max="<?php echo $productr["qty"]?>" min="1" value="<?php echo $cr["qty"] ?>" id="sst" class="mt-3 border border-1 border-secondary fs-5 fw-bold px-3 cartqtytxt">
                                                                <br>
                                                                <span class="fw-bold text-black-50 fs-6"> Delivery Fee : &nbsp;</span>
                                                                <span class="fs-5 text-black">Rs. <?php echo $ship ?>.00</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card-body d-grid">
                                                                <a  class="btn btn-outline-success mb-2"  onclick="payNow(<?php echo $productr['id']?>)">Pay for This</a>
                                                                <a onclick="deleteFromCart(<?php echo $cr['id'] ?>)" class="btn btn-outline-danger mb-2">Remove</a>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-12 mt-3 mb-3">
                                                            <div class="row">
                                                                <div class="col-6 col-md-6">
                                                                    <span class="fw-bold fs-5 text-black-50">Requested Total&nbsp; <i class="bi bi-info-circle"></i></span>
                                                                </div>
                                                                <div class="col-6 col-md-6 text-end">
                                                                    <span class="fw-bold fs-5 text-black">Rs. <?php echo ($productr["price"] * $cr["qty"]) + $shipping ?>.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                        <?php
                                            }
                                        }
                                        ?>

                                    <?php

                                    }                                    ?>
                                </div>
                            </div>

                            <div class="col-12 col-lg-3">
                                <div id="summary">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label ms-2 fs-3 fw-bold">Summary</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <span class="fs-6 fw-bold">Items (<?php echo $cn ?>)</span>
                                    <span class="fs-6 fw-bold">Rs. <?php echo $total ?>.00</span>
                                </div>
                                <div class="col-12 mt-2 d-flex justify-content-between">
                                    <span class="fs-6 fw-bold">Shipping</span>
                                    <span class="fs-6 fw-bold">Rs. <?php echo $shipping ?>.00</span>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12 mt-2 d-flex justify-content-between">
                                    <span class="fs-4 fw-bold">Total</span>
                                    <span class="fs-4 fw-bold">Rs. <?php echo $total + $shipping ?>.00</span>
                                </div>
                                <div class="col-12 mt-3 mb-3 d-grid px-1">
                                    <button class="btn btn-primary fs-6 fw-bold" onclick="buyFromCart()">Go to Checkout</button>
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
            </div>
        </div>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script.js"></script>
        <script src="thief.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script type="text/javascript">
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
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
    
    </body>

    </html>
<?php
}else{
    ?>
<script>
    window.location = "index.php"
</script>

<?php
}

?>