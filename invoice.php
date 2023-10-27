<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {
    $uemail = $_SESSION["u"]["email"];
    $orderId = $_GET["id"];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice</title>
        <link rel="icon" href="resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    </head>

    <body class="mt-2" style="background-color: #f7f7ff;">
    <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
        <div class="container-fluid">
            <div class="row">
                <?php
                require "components/header.php";
                ?>
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12 btn-toolbar justify-content-end">
                            <button class="btn btn-dark me-2" value="click" onclick="printDiv()"><i class="bi bi-printer-fill"></i>&nbsp; Print</button>
                            <button class="btn btn-danger me-2"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp; Save as PDF</button>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div id="GFG">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="invoiceheaderlogo"></div>
                                    </div>
                                    <div class="col-6 text-end alert alert-danger">
                                        <h2 class=" text-danger">HunsTextiles</h2>
                                        <span>Maradana, Colombo 10, Sri Lanka</span><br>
                                        <span>+94112546978</span><br>
                                        <span>hunsaasolutions@gmail.com</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class="border border-1 border-danger">
                            </div>
                            <div class="col-12 mb-4 alert alert-danger">
                                <div class="row">
                                    <div class="col-6 ">
                                        <h5>INVOICE TO</h5>
                                        <?php
                                        $addressrs = Database::select("SELECT * FROM `user_has_address` WHERE `user_email`='" . $uemail . "'");
                                        $ar = $addressrs->fetch_assoc();

                                        $cityid = $ar["city_id"];
                                        $districtrs = Database::select("SELECT * FROM `city` WHERE `id` = '" . $cityid . "'");
                                        $xr = $districtrs->fetch_assoc();
                                        $districtid = $xr["district_id"];

                                       

                                      
                                        ?>
                                        <h2><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"] ?></h2>
                                        <span class="fw-bold"><?php echo $ar["line_1"] . "," . $ar["line_2"] . "," . $xr["name"]?></span><br>
                                        <span class="fw-bold text-link text-decoration-underline"><?php echo $uemail ?></span>
                                    </div>
                                    <?php

                                    $invoicers = Database::select("SELECT * FROM `invoice` WHERE `order_id`='" . $orderId . "'");
                                    $in = $invoicers->num_rows;
                                    $ir = $invoicers->fetch_assoc();

                                    ?>
                                    <div class="col-6 text-end">
                                        <h1 class="text-danger">INVOICE <?php echo $ir["id"] ?></h1>
                                        <span>Date and time of Invoice :</span>&nbsp;
                                        <span> <?php echo $ir["date"] ?></span>
                                    </div>


                                </div>
                            </div>
                            <div class="col-12">
                                <table class="table" style="background-color: #fafbfc;">
                                    <thead class="alert alert-danger">
                                        <tr class="border border-1 border-white">
                                            
                                            <th class="border-white">Order ID & Product</th>
                                            <th class="text-end  border-white">Unit Price</th>
                                            <th class="text-end  border-white">Quantity</th>
                                            <th class="text-end border-white">Shipping Cost</th>
                                            <th class="text-end  border-white">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $invoices = Database::select("SELECT * FROM `invoice_item` WHERE `invoice_id`='" . $ir["id"] . "'");
                                        $ins = $invoices->num_rows;

                                        $subtotal = "0";
                                        $ship = "0";
                                        $shipping = "0";
                                        $dprice;
                                        $newprice;
                                        for ($i = 0; $i < $ins; $i++) {
                                            $irs = $invoices->fetch_assoc();


                                            
                                        ?>
                                            <tr style="height: 70px;" class="border border-1 border-white ">
                                                
                                                <td class="border-white">
                                                    <a href="" class="link-danger fw-bold p-2"><?php echo $ir["order_id"] ?></a>
                                                    <br>
                                                    <?php
                                                    $productrs = Database::select("SELECT * FROM `product` WHERE `id`='" . $irs["product_id"] . "'");
                                                    $pr = $productrs->fetch_assoc();
                                                   

                                                    if ($districtid == 1) {
                                                        $ship = $pr["deliver_fee_colombo"];
                                                        // $shipping = $shipping + $pr["deliver_fee_colombo"];
                                                    } else {
                                                        $ship = $pr["deliver_fee_outside_colombo"];
                                                        // $shipping = $shipping + $pr["deliver_fee_outside_colombo"];
                                                    }

                                                    $item_price = $pr["price"];
                                                    $invoice_item_qty = $irs["qty"];
                                                    $item_total = $item_price * $invoice_item_qty + $ship;
                                                    $subtotal = $subtotal + $item_total;
                                                    ?>
                                                    <a href="" class="link-primary fw-bold p-2 link-danger"><?php echo $pr["title"] ?></a>
                                                </td>
                                                <td class="fs-6 text-end pt-3 border-white text-danger fw-bold">Rs. <?php echo $item_price?>.00</td>
                                                <td class="fs-6 text-end pt-3 border-white text-danger"><?php echo $invoice_item_qty?></td>
                                                <td class="fs-6 text-end pt-3 border-white text-danger">Rs. <?php echo $ship?>.00</td>
                                                <td class="fs-6 text-end bg-danger text-white pt-3">Rs. <?php echo $item_total?>.00</td>
                                            </tr>
                                        <?php

                                        }

                                        ?>
                                    </tbody>
                                    <tfoot class="text-danger">
                                        <tr class="text-danger">
                                            <td colspan="2" class="border-0"></td>
                                            <td colspan="2" class="fs-5 text-end">SUB TOTAL</td>
                                            <td class="fs-5 text-end">Rs. <?php echo $subtotal?>.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="border-0"></td>
                                            <td colspan="2" class="fs-5 text-end border-danger">Discount</td>
                                            <?php
                                            
                                            $dprice;
                                            $itemprice = $ir["total"];
                                               
                                        
                                                
                                                ?>
                                                <td class="fs-5 text-end border-danger">Rs. <?php echo$subtotal- $itemprice?>.00</td>
                                                <?php
                                            
                                            
                                            ?>
                                           
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="border-0"></td>
                                            <td colspan="2" class="fs-5 text-end border-0">GRAND TOTAL</td>
                                            <td class="fs-4 text-end border-0 ">Rs. <?php echo $itemprice?>.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-4 text-center" style="margin-top: -100px; margin-bottom: 50px;">
                                <span class="fs-1 fw-bold">Thank You !</span>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 alert alert-danger mt-3 mb-3 border border-5 border-start border-end-0 border-top-0 border-bottom-0 border-danger rounded-3">
                                        <label class="form-label fs-5 fw-bolder">NOTICE</label><br>
                                        <label class="form-label fs-6 fw-bolder">Purchased Items can return within 7 days of delivery</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12 mb-3 text-center">
                                <label class="form-label fs-6 text-black-50">
                                    Invoice was created on a computer and is valid without the Signature and Seal
                                </label>
                            </div>
                        </div>
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
    
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
}
