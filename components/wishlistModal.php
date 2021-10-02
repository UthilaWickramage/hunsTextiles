<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/product_details.css">
    <link rel="stylesheet" href="./styles/page-speed.css">
    <link rel="stylesheet" href="../styles/bootstrap.css">
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
</head>

<body>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wi>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Your Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                        <div>
                            A new product added to your cart
                        </div>
                    </div>
                    <table class="table table-bordered ">
                        <tbody>
                            <tr>
                                <th scope="col">Product Thumbnail</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Added Date</th>
                            </tr>


                            <tr class="align-middle">
                                <td class="d-flex justify-content-center"><img src="./resources/xproduct-6.jpg.pagespeed.ic.cSjqAX05pL.png" height="200" width="auto" alt=""></td>
                                <td>Red Color Women Dress </td>
                                <td>1</td>
                                <td>Rs.10000.00</td>
                                <td>2021-09-21</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="./cart.php" type="button" class="btn btn-success">Go to Cart</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://preview.colorlib.com/theme/karma/js/jquery.magnific-popup.min.js+owl.carousel.min.js.pagespeed.jc.uzdaTXytfs.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="./js/classy.nav.js"></script>
    <script type="text/javascript" src="./js/text.js"></script>
</body>

</html>