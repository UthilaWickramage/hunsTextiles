<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Welcome</title>
    <link rel="icon" href="./resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

</head>

<body style=" height: 100vh; overflow: hidden;">

    <div class="container-fluid justify-content-center">
        <div class="row align-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 text-center mt-5">
                    <img src="./resources/4171933_admin_administration_administrator_area_accesss_icon.svg" height="100px" width="auto" alt="">
                    </div>
                </div>
                <div class="col-12">
                <p class="text-center fw-bolder fs-1 title1">
                     Welcome to Hunstextiles Admin
                  </p>
                </div>
            </div>
            <div class="col-12">
                <div class="row d-glex justify-content-center">
                    
                    <div class="col-lg-4 col-12 d-block">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="title2">Verify Admin</p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">
                                    Email Address
                                </label>
                                <input type="email" class="form-control" id="e">
                            </div>
                            <div class="col-12 d-grid">
                                <button class="btn btn-primary" onclick="adminverification()">Send Verification code to Login</button>
                            </div>
                            <div class="col-12 d-grid">
                                <a class="btn btn-danger" href="index.php">Back to User's Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-none d-lg-block fixed-bottom">
                <p class="text-center"> &copy; 2021 HunsTextiles.store All Rights Reserved</p>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="adminVerificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Admin Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Enter the Verification Code you got from the email</label>
                    <input type="text" class="form-control" id="v">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" onclick="verify()">Verify</button>
                </div>
            </div>
        </div>
    </div>
    <div class="spinner-bg" id="customSpinner">
        <div class="spinner-border text-white border-5 " style="width: 5rem; height: 5rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>