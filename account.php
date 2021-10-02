<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account</title>
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

<body style="overflow-x: hidden;">
    <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
    <?php
    require "./components/header.php";
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row mb-3 mt-3">
                    <div class="col-12">
                        <h2>Manage My Account</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card p-5 shadow-sm p-3 mb-5 rounded">
                            <div class="row">
                                <div class="col-12">
                                    <h6>Personal Profile | <a class="text-primary" style="cursor: pointer;" onclick="editProfileModal()">Edit</a></h6>

                                </div>
                                <?php
                                if (isset($_SESSION["user"])) {
                                    $user = $_SESSION["user"];

                                ?>
                                    <div class="col-12">
                                        <span class="form-label">Full Name : </span>
                                        <input type="text" class="form-control mt-2 mb-2" value="<?php echo $user["fname"] . " " . $user["lname"] ?>" disabled>
                                    </div>
                                    <div class="col-12">
                                        <span>Registered Email address : </span>
                                        <input type="text" class="form-control mt-2 mb-2" value="<?php echo $user["email"] ?>" disabled>
                                    </div>
                                    <div class="col-12">
                                        <span>Registered Mobile No : </span>
                                        <input type="text" class="form-control mt-2 mb-2" value="<?php echo $user["mobile"] ?>" disabled>
                                    </div>
                                    <div class="col-12">
                                        <span>Registered Date : </span>
                                        <input type="text" class="form-control mt-2 mb-2" value="<?php echo $user["register_date"] ?>" disabled>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row card shadow-sm p-3 mb-5 rounded p-5">
                            <div class="col-6 pt-3">
                                <div class="row">
                                    <h5>Default Billing Address</h5>
                                    <p>748/38 katuwawala Road, Nugagahawatta, Maharagama <a onclick="editAddressModal()" style="cursor: pointer;" class="text-primary">Edit</a></p>

                                </div>
                            </div>
                            <hr>
                            <div class="col-6">
                                <div class="row">
                                    <h5>Default Shipping Address</h5>
                                    <p>748/38 katuwawala Road, Nugagahawatta, Maharagama <a onclick="editAddressModal()" style="cursor: pointer;" class="text-primary">Edit</a></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="" class="btn btn-primary d-grid">Go To Wishlist</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="" class="btn btn-warning d-grid">Go To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row card p-3">
                    <div class="col-12">
                        <table class="table">
                            <tr class="card-header">
                                <td>Order #</td>
                                <td>Placed On</td>
                                <td>Items</td>
                                <td>Total</td>
                            </tr>
                            <tr>
                                <td>204930965921615</td>
                                <td>21/09/2021</td>
                                <td>Red Women Mini dress</td>
                                <td>3500.00</td>
                                <td class="btn text-info" onclick="manageOrderModal() ">MANAGE</td>
                            </tr>
                            <tr>
                                <td>204930965921615</td>
                                <td>21/09/2021</td>
                                <td>Red Women Mini dress</td>
                                <td>3500.00</td>
                                <td class="btn text-info" onclick="manageOrderModal() ">MANAGE</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php
    require "./components/footer.php";

    ?>

    <div class="modal fade" id="editAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12 d-block">
                            <p class="text-danger" id="modalErr"></p>
                        </div>
                        <?php
                        if (isset($_SESSION["user"])) {
                            $user = $_SESSION["user"];

                        ?>
                            <div class="col-12">
                                <span class="form-label">First Name : </span>
                                <input type="text" id="fname" class="form-control mt-2 mb-2" value="<?php echo $user["fname"] ?>">
                            </div>

                            <div class="col-12">
                                <span class="form-label">Last Name : </span>
                                <input type="text" id="lname" class="form-control mt-2 mb-2" value="<?php echo $user["lname"] ?>">
                            </div>
                            <div class="col-12">
                                <span>Registered Email address : </span>
                                <input type="text" id="email" class="form-control mt-2 mb-2" value="<?php echo $user["email"] ?>">
                            </div>
                            <div class="col-12">
                                <span>Registered Mobile No : </span>
                                <input type="text" id="mobile" class="form-control mt-2 mb-2" value="<?php echo $user["mobile"] ?>">
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateProfile()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editaddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Your Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <h6>Edit your billing address</h6>
                                </div>
                                <div class="col-12">
                                    <span class="form-label">Line 1 </span>
                                    <input type="text" class="form-control mt-2 mb-2" value="748/38 Katuwawala Road">
                                </div>
                                <div class="col-12">
                                    <span>Line 2 </span>
                                    <input type="text" class="form-control mt-2 mb-2" value="Nugagahawatta">
                                </div>
                                <div class="col-12">
                                    <span>City </span>
                                    <select class="form-select">
                                        <option value="">Maharagama</option>
                                        <option value="">Nugegoda</option>
                                        <option value="">Panninpitiya</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <span>District </span>
                                    <select class="form-select" disabled>
                                        <option value="">Colombo</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <span>Province </span>
                                    <select class="form-select" disabled>
                                        <option value="">Western</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <h6>Edit your shipping address</h6>
                                </div>
                                <div class="col-12">
                                    <span class="form-label">Line 1 </span>
                                    <input type="text" class="form-control mt-2 mb-2" value="748/38 Katuwawala Road">
                                </div>
                                <div class="col-12">
                                    <span>Line 2 </span>
                                    <input type="text" class="form-control mt-2 mb-2" value="Nugagahawatta">
                                </div>
                                <div class="col-12">
                                    <span>City </span>
                                    <select class="form-select">
                                        <option value="">Maharagama</option>
                                        <option value="">Nugegoda</option>
                                        <option value="">Panninpitiya</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <span>District </span>
                                    <select class="form-select" disabled>
                                        <option value="">Colombo</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <span class="form-label">Province </span>
                                    <select class="form-select" disabled>
                                        <option value="">Western</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manageOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order # 2345674367</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row card">
                        <div class="col-12 card-header">
                            <h6>Total : Rs. 12000.00</h6>
                        </div>
                        <div class="col-12 mt-3 p-3 ">
                            <div class="row">
                                <div class="col-4">
                                    <p>Sold By Addidas</p>
                                </div>
                                <div class="col-6">
                                    <p>Get by Sun 26 Sep - Mon 27 Sep</p>
                                </div>
                                <div class="col-2">
                                    <p class="text-info">Chat Now</p>
                                </div>
                            </div>
                        </div>



                        <div class="col-12">

                            <input type="range" class="form-range" min="0" max="4" step="1" id="customRange3">
                        </div>
                        <div class="col-12">
                            <div class="alert alert-primary" role="alert">
                                Your order is being processed
                            </div>
                        </div>
                        <div class="col-12">
                            <table class="table">
                                <tr>
                                    <td>Women Red Mini Dress</td>
                                    <td>Rs.3000.00</td>
                                    <td>Qty : 1</td>
                                    <td class="text-info">Cancel</td>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <div class="row card">
                        <div class="col-12 card-header">
                            <h6>Total : Rs. 12000.00</h6>
                        </div>
                        <div class="col-12 mt-3 p-3">
                            <div class="row">
                                <div class="col-4">
                                    <p>Sold By Addidas</p>
                                </div>
                                <div class="col-6">
                                    <p>Get by Sun 26 Sep - Mon 27 Sep</p>
                                </div>
                                <div class="col-2">
                                    <p class="text-info">Chat Now</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">

                            <input type="range" class="form-range" min="0" max="4" step="1" id="customRange3">
                        </div>
                        <div class="col-12">
                            <div class="alert alert-primary" role="alert">
                                Your order is being processed
                            </div>
                        </div>
                        <div class="col-12">
                            <table class="table">
                                <tr>
                                    <td>Women Red Mini Dress</td>
                                    <td>Rs.3000.00</td>
                                    <td>Qty : 1</td>
                                    <td class="text-info">Cancel</td>
                                </tr>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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

    <script src="./js/account.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>