<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="./styles/page-speed.css">
    <link rel="stylesheet" href="./styles/bootstrap.css">
    <link rel="icon" href="./resources/logo2.svg">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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

<body>
    <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
    <?php
    require "./components/header.php";
    ?>
    <div class="container">
        <div class="col-12 mt-4 mb-5">
            <h2>Your Cart</h2>
            <table class="table table-bordered mt-3">
                <tbody>
                    <tr>
                        <th></th>
                        <th scope="col">Product Thumbnail</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Added Date</th>
                        <th></th>
                    </tr>


                    <tr class="align-middle">
                        <td>
                            <input type="checkbox" class="form-check-input">
                        </td>
                        <td class="d-flex justify-content-center"><img src="./resources/xproduct-6.jpg.pagespeed.ic.cSjqAX05pL.png" height="200" width="auto" alt=""></td>
                        <td>Red Color Women Dress </td>
                        <td>Rs.10000.00</td>
                        <td class="justify-content-center">
                            <input type="number" style="width:100px" class="form-control" value="1">
                        </td>
                        <td>Rs.10000.00</td>
                        <td>2021-09-21</td>
                        <td>
                            <i class="bi bi-file-x-fill" style="font-weight: bolder; color:red; font-size: 32px; cursor:pointer;"></i>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td>
                            <input type="checkbox" class="form-check-input">
                        </td>
                        <td class="d-flex justify-content-center"><img src="./resources/xproduct_11.jpg.pagespeed.ic.k2tGjLCUxj.png" height="200" width="auto" alt=""></td>
                        <td>Red Color Women Dress </td>
                        <td>Rs.10000.00</td>
                        <td class="justify-content-center">
                            <input type="number" style="width:100px" class="form-control" value="1">
                        </td>
                        <td>Rs.10000.00</td>
                        <td>2021-09-21</td>
                        <td>
                            <i class="bi bi-file-x-fill" style="font-weight: bolder; color:red; font-size: 32px; cursor:pointer;"></i>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td>
                            <input type="checkbox" class="form-check-input">
                        </td>
                        <td class="d-flex justify-content-center"><img src="./resources/xproduct_5.jpg.pagespeed.ic.vwXupzPutW.png" height="200" width="auto" alt=""></td>
                        <td>Red Color Women Dress </td>
                        <td>Rs.10000.00</td>
                        <td class="justify-content-center">
                            <input type="number" style="width:100px" class="form-control" value="1">
                        </td>
                        <td>Rs.10000.00</td>
                        <td>2021-09-21</td>
                        <td>
                            <i class="bi bi-file-x-fill" style="font-weight: bolder; color:red; font-size: 32px; cursor:pointer;"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-12 mb-5">
            <div class="row">
                <div class="col-6 justify-content-center">
                    <a href="" class="btn btn-success me-4">Continue Shopping</a>
                    <a href="" class="btn btn-outline-success">Go To Your Wishlist</a>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <h3>Cart Total</3>
                        </div>
                        <div class="col-12">
                            <table class="table">
                                <tr>
                                    <td>Sub total</td>
                                    <td>Rs. 30000.00</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>Rs. 30000.00</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6 offset-3 mt-4 d-grid">
                            <button class="btn btn-danger">
                                Go to checkout
                            </button>
                        </div>
                    </div>
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
<script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>