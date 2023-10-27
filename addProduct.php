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
        <title>Admin | Add Product</title>
        <link rel="icon" href="./resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="bootstrap2.css">
        <link rel="stylesheet" href="ui.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    
    <body style="overflow-x: hidden;">
        <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
    
        <?php
        require "./components/aside.php";
        ?>
    
    
    
        <main class="main-wrap">
            <section class="content-main" style="max-width:1200px">
    
                <div class="content-header">
                    <h2 class="content-title">Publish a Product</h2>
                </div>
    
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <label class="form-label">Category</label>
                                        <select class="form-select" id="ca" onchange="bringCategory(); bringsize();">
    
                                            <?php
                                            $cars = Database::select("SELECT * FROM category");
                                            $catn = $cars->num_rows;
    
                                            for ($i = 0; $i < $catn; $i++) {
                                                $car = $cars->fetch_assoc();
    
                                            ?>
                                                <option value="<?php echo $car["id"] ?>"><?php echo $car["name"] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label class="form-label">Sub Category</label>
                                        <select class="form-select" style="background-color: ghostwhite;" id="su_ca">
                                            <option value="">Select Category</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label class="form-label">Brand</label>
                                        <select class="form-select" style="background-color: ghostwhite;" id="br">
    
                                            <?php
                                            $br = Database::select("SELECT * FROM brand");
                                            $brn = $br->num_rows;
    
                                            for ($i = 0; $i < $brn; $i++) {
                                                $brs = $br->fetch_assoc();
    
                                            ?>
                                                <option value="<?php echo $brs["id"] ?>"><?php echo $brs["name"] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
    
    
    
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <label for="product_title" class="form-label">Select Item Size</label>
                                                <select class="form-select" id="sizeselect" style="background-color: ghostwhite;" id="size">
                                                    <option>select category</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Select Item Color</label>
                                                <select class="form-select" style="background-color: ghostwhite;" id="color">
                                                    <?php
                                                    $colr = Database::select("SELECT * FROM color");
                                                    $colrn = $colr->num_rows;
    
                                                    for ($i = 0; $i < $colrn; $i++) {
                                                        $colrs = $colr->fetch_assoc();
    
                                                    ?>
                                                        <option value="<?php echo $colrs["id"] ?>"><?php echo $colrs["name"] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label lbl1">Select Item Quantity</label>
                                                <input type="number" class="form-control" style="background-color: ghostwhite;" value="1" min=1 id="qty">
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <hr>
    
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <label class="form-label lbl1">Cost per Item</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" style="background-color: ghostwhite;" aria-label="Amount (to the nearest rupee)" id="pr">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label lbl1">Delivery Cost Within Colombo</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" style="background-color: ghostwhite;" aria-label="Amount (to the nearest rupee)" id="cwc">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label lbl1">Delivery Cost Outside Colombo</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" style="background-color: ghostwhite;" aria-label="Amount (to the nearest rupee)" id="coc">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-12 col-md-8">
                                        <label for="product_title" class="form-label">Item title</label>
                                        <input type="text" placeholder="Type here" style="background-color: ghostwhite;" class="form-control" id="title">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="product_title" class="form-label">SKU</label>
                                        <input type="text" placeholder="Type here" style="background-color: ghostwhite;" class="form-control" id="sku">
                                    </div>
                                </div>
                                <hr>
    
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Item Description</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" cols="100" rows="15" style="background-color: ghostwhite;" id="desc"></textarea>
                                    </div>
                                </div>
                                <hr>
    
                                <div class="col-12 mb-3">
    
    
    
    
                                    <div class="row mt-3">
                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label lbl1">Add Product Image</label>
                                                </div>
                                                <div class="col-4 col-lg-2 ms-lg-2 productImg">
                                                    <img class="img-thumbnail" src="./resources/addproductimg.svg" alt="" id="prev">
                                                </div>
    
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-6">
                                                                <input class="d-none" type="file" accept="image/*" id="imageUploader">
                                                                <label class="btn btn-primary col-4 col-lg-4" for="imageUploader" onclick="changeImg()">Upload</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
    
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 offset-md-3 d-grid">
                                        <button onclick="addProduct()" class="btn btn-success text-light">
                                            Save Product
                                        </button>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div> <!-- card end// -->
                </div> <!-- col end// -->
    
                </div> <!-- row end// -->
    
    
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
    
    
    
    
    
    
    
    
    
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <script src="thief.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
