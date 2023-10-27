<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $uemail = $_SESSION["u"]["email"];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My WishList</title>
        <link rel="icon" href="./resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap2.css">
    <link rel="stylesheet" href="ui.css">
    </head>

    <body>
    <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
        <div class="container-fluid">
            <div class="row">
                <?php
                require "components/header.php";
                ?>

                <div class="col-12 border border-1 border-secondary rounded" id="productDetails">
                    <div class="row">
                        <div class="col-6 offset-3 offset-lg-0 col-lg-12">
                            <label class="form-label fs-1 fw-bolder text-uppercase">WishList &hearts;</label>
                        </div>
                        <div class="col-12 col-lg-6">
                            <hr>
                        </div>
                       
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12 col-lg-2">
                           
                        </div>

                        <?php
                        $watchlistrs = Database::select("SELECT * FROM `watchlist` WHERE `user_email`='" . $uemail . "'");
                        $wn = $watchlistrs->num_rows;

                        if ($wn == 0) {
                        ?>
                            <!-- without items -->
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-12 empty-view"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label text-info fs-2 mb-5 fw-bolder">Your Wish List is Empty</label>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12 col-lg-9">
                                <div class="row g-2">
                                    <?php
                                    for ($s = 0; $s < $wn; $s++) {
                                        $wr = $watchlistrs->fetch_assoc();
                                        $wid =  $wr["product_id"];

                                        $productrs = Database::select("SELECT * FROM `product` WHERE `id`='" . $wid . "'");
                                        $pn = $productrs->num_rows;

                                        if ($pn == 1) {
                                            for ($p = 0; $p < $pn; $p++) {
                                                $pfr = $productrs->fetch_assoc();

                                    ?>
                                                <!-- with items -->


                                                <div class="card mb-3 col-12">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                            <?php
                                                            $imagers = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $wid . "'");
                                                            $in = $imagers->num_rows;

                                                            $arr;

                                                            for ($x = 0; $x < $in; $x++) {
                                                                $ir = $imagers->fetch_assoc();
                                                                $arr[$x] = $ir["code"];
                                                            }
                                                            ?>
                                                            <img src="<?php echo $arr[0] ?>" style="height:200px ; width: auto;" class=" rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $pfr["title"] ?></h5>
                                                                <span class="fw-bold text-black-50">Color : Graphite</span> &nbsp; |
                                                                &nbsp;<span class="fw-bold text-black-50">Condition : Brand New</span>
                                                                <br>
                                                                <span class="fw-bold text-black-50 fs-5"> Price : &nbsp;</span>
                                                                <span class="fs-5">Rs. <?php echo $pfr["price"] ?>.00</span>
                                                                <hr>
                                                                <span class="fw-bold text-black-50"> Brand : &nbsp;</span>
                                                                <br>
                                                                <?php
                                                                $brrs = Database::select("SELECT * FROM `brand` WHERE `id`='".$pfr["brand_id"]."'");
                                                                $brn = $brrs->fetch_assoc();
                                                                
                                                                ?>
                                                                <span class=""><?php echo $brn["name"] ?></span>
                                                                
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card-body d-grid">
                                                                <a href="<?php echo "singleProductView.php?pid=" . ($pfr["id"]); ?>" class="btn btn-outline-success mb-2">Buy Now</a>
                                                                <a href="" class="btn btn-outline-secondary mb-2" onclick="addToCart(<?php echo $pfr['id'] ?>)">Add to Cart</a>
                                                                <a href="" class="btn btn-outline-danger mb-2" onclick="deleteFromWatchList(<?php echo $wr['id']?>)">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>




                    </div>
                </div>

                <?php
                require "components/footer.php";
                ?>
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
<?php
}else{
    ?>
<script>
    window.location = "index.php"
</script>

<?php
}
?>