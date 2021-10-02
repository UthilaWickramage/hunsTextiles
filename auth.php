<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">Sign In</title>
    <link rel="icon" href="./resources/logo2.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/bootstrap.css">
    <link rel="stylesheet" href="./styles/shadow.css">
    <link rel="stylesheet" href="./styles/index.css">
</head>

<body onload="checking()" class="main-background">
    <div class="container-fluid vh-100 overflow-md-hidden">
        <div class="row d-flex mt-md-3">
            <div class="col-12 col-md-8 offset-md-2 mt-5 d-block shadow-dreamy main ">
                <div class="row">
                    <div class="col-12 d-none" id="signUpPage">
                        <div class="row">
                            <div class="col-12 col-md-7 px-5 pt-2 signupform">
                                <div class="row px-2 gx-1">
                                    <div class="col-12 logo1">
                                    </div>
                                    <div class="col-12 d-block err-msg">
                                        <p class=" text-danger " id="errMsg"></p>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="fname" onchange="checking()">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lname" onchange="checking()">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" onchange="checking()">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control " id="password" onchange="checking()">
                                        <i class="bi bi-eye-slash password-eye" id="togglePassword"></i>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" onchange="checking()">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" id="gender">
                                            <?php
                                            require "./config/connection.php";

                                            $r = Database::select("SELECT * FROM `gender`");
                                            $n = $r->num_rows;

                                            for ($i = 0; $i < $n; $i++) {
                                                $d = $r->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>

                                            <?php
                                            }

                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="check" onchange="checking()">
                                            <label class="form-check-label" id="check-label">
                                                I Accept eCommerce terms of use & privacy policies
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="row gy-2">
                                            <div class="col-12 d-grid">
                                                <button class="btn btn-dark" id="signupBtn" onclick="signUp()">Sign Up</button>
                                            </div>
                                            <div class="col-12 d-grid d-block d-md-none mb-sm-2">
                                                <button class="btn btn-dark " onclick="changeView()">Already Have an Account? Sign In</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 d-none d-md-block d-grid img rounded ">
                                <div class="row gradient h-100 d-flex align-items-center ">
                                    <div class="col-12 d-flex flex-column justify-content-center">
                                        <p class="fs-2 text-md-center text-light d-block">One of us?</p>
                                        <p class="text-md-center text-light">If you already has an account, just sign in. We've missed you!</p>
                                        <button class="btn btn-dark align-self-center" onclick="changeView()">Sign In Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-5 mb-md-0" id="signInPage">
                        <div class="row">
                            <div class="col-5 d-none d-md-block d-grid img-2 rounded">
                                <div class="row gradient h-100 d-flex align-items-center ">
                                    <div class="col-12 d-flex flex-column justify-content-center">
                                        <p class="fs-2 text-md-center text-light d-block">Create Your eCommerce Account Now</p>
                                        <p class="text-md-center text-light">Access and get everything to your door step</p>
                                        <button class="btn btn-dark align-self-center" onclick="changeView()">Create New Account</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-7  px-5 pb-5 pt-2 d-flex align-items-center">
                                <div class="row px-2 gx-1">
                                    <div class="col-12 logo">
                                    </div>
                                    <div class="col-12 d-block err-msg">
                                        <p class=" text-danger " id="msg2"></p>
                                    </div>
                                    <?php
                                    $e = "";
                                    $p = "";

                                    if (isset($_COOKIE["_em"])) {
                                        $e = $_COOKIE["_em"];
                                        
                                    }
                                    if (isset($_COOKIE["_pd"])) {
                                        $p = $_COOKIE["_pd"];
                                    }
                                    ?>
                                    <div class="col-12 mt-2 ">
                                        <label class="form-label">Email Address</label>
                                        <input type="text" class="form-control" value="<?php echo $e ?>" id="email2">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" value="<?php echo $p ?>" id="password2">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="form-check">
                                        <?php
                                            if(isset($_COOKIE["_em"])){
                                                ?>
                                               <input class="form-check-input" type="checkbox" id="remember" checked >
                                                <?php
                                            }else{
                                            ?>
                                            <input class="form-check-input" type="checkbox" id="remember" >
                                            <?php
                                            }
                                            ?>
                                             
                                            <label class="form-check-label">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="row gy-2">
                                            <div class="col-12 d-grid">
                                                <button class="btn btn-dark" onclick="signIn()">Sign In</button>
                                            </div>
                                            <div class="col-12 d-grid d-block d-md-none">
                                                <button class="btn btn-dark" onclick="changeView()">New to eShop? Create account</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <a href="#" class="link-primary" onclick="forgotPassword()">Forgot Password?</a>
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
    <!-- popup modals -->
    <div class="modal fade" tabindex="-1" id="forgotPasswordModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">

                                <input class="form-control" type="password" id="np">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword1()" id="npbtn">Show</button>
                            </div>

                        </div>
                        <div class="col-12">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group mb-3">

                                <input class="form-control" type="password" id="cnp">
                                <button class="btn btn-outline-secondary" type="button" id="cnpbtn" onclick="togglePassword2()">Show</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Verification Code</label>
                            <input class="form-control" type="text" id="vc">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetPassword()">Reset</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modelPassword2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enter your new password here, off you go!!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" id="password3">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword3()" id="pbtn3">Show</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="signInModal()">Sign In</button>
                </div>
            </div>
        </div>
    </div>
    <div class="spinner-bg" id="customSpinner">
        <div class="spinner-border text-primary " style="width: 5rem; height: 5rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="./js/script.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>