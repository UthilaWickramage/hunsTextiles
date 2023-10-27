<?php
session_start();
if(isset($_SESSION["u"])){
   ?>
<script>window.location="home.php"</script>
   <?php
}else{


?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>HunsTextiles</title>

   <link rel="icon" href="./resources/logo.svg">
   <link rel="stylesheet" href="bootstrap.css">
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <div class="container-fluid vh-100">
      <div class="row">

         <!-- header -->
         <div class="col-12">
            <div class="row">
               <div class="col-12 text-center mt-5">
                  <img src="./resources/logo.svg" onclick="goToHome()" style="cursor: pointer;" height="100px" width="auto" alt="">
               </div>
               <div class="col-12 d-none d-md-block">
                  <p class="text-center fw-bolder fs-1 title1">
                     Welcome to Hunstextiles
                  </p>
               </div>
            </div>
         </div>
         <!-- header -->

         <!-- content -->
         <div class="col-12 px-5">
            <div class="row d-flex justify-content-center">

               <div class="col-md-6 col-12 d-none" id="signUpBox">
                  <div class="row gy-2 mt-3 mt-md-0">
                     <div class="col-12">
                        <p class="fw-bold fs-5 text-uppercase">Create an Account</p>
                        <p class="text-danger" id="msg"></p>
                     </div>
                     <div class="col-6">
                        <label class="form-label">First Name</label>
                        <input class="form-control" type="text" id="fname">
                     </div>
                     <div class="col-6">
                        <label class="form-label">Last Name</label>
                        <input class="form-control" type="text" id="lname">
                     </div>
                     <div class="col-12">
                        <label class="form-label">Email Address</label>
                        <input class="form-control" type="email" id="email">
                     </div>
                     <div class="col-12">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" id="password">
                     </div>
                     <div class="col-6">
                        <label class="form-label">Mobile</label>
                        <input class="form-control" type="text" id="mobile">
                     </div>
                     <div class="col-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select" id="gender">
                           <?php
                           require "connection.php";

                           $resultset = Database::select("SELECT * FROM `gender`");
                           $n = $resultset->num_rows;
                           for ($x = 0; $x < $n; $x++) {
                              $d = $resultset->fetch_assoc();
                           ?>
                              <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                           <?php
                           }

                           ?>

                        </select>
                     </div>
                     <div class="col-12 col-md-6 d-grid">
                        <button class="btn btn-primary" onclick="VerifyEmail()">Sign Up</button>
                     </div>
                     <div class="col-12 col-md-6 d-grid">
                        <button class="btn btn-dark" onclick="changeView()">Already Have an Account? Sign In</button>
                     </div>
                  </div>
                  
               </div>

               <div class="col-md-4 col-12" id="signInBox">
                  <div class="row gy-2">
                     <div class="col-12">
                        <p class="fw-bold fs-5 text-uppercase">Sign In to your Account</p>
                        <p class="text-danger" id="msg2"></p>
                     </div>
                     <?php
                     $e = "";
                     $p = "";

                     if (isset($_COOKIE["user_name"])) {
                        $e = $_COOKIE["user_name"];
                     }
                     if (isset($_COOKIE["password"])) {
                        $p = $_COOKIE["password"];
                     }
                     ?>
                     <div class="col-12">
                        <label class="form-label">Email Address</label>
                        <input class="form-control" type="email" value="<?php echo $e; ?>" id="email2">
                     </div>
                     <div class="col-12">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" value="<?php echo $p; ?>" id="password2">
                     </div>
                     <div class="col-6">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="remember">
                           <label class="form-check-label">
                              Remember Me
                           </label>
                        </div>
                     </div>
                     <div class="col-6 text-end">
                        <a href="#" class="link-primary" onclick="forgotPassword()">Forgot Password?</a>
                     </div>
                     <div class="col-12 d-grid">
                        <button class="btn btn-primary" onclick="signIn()">Sign In</button>
                     </div>
                     <div class="col-12 d-grid">
                        <button class="btn btn-danger" onclick="changeView()">New One? create account</button>
                     </div>
                     <div class="col-12 text-center">
                     <a href="adminSignin.php" class="link-dark">Admin? Sign In</a>
                     </div>
                  
                  </div>
                
               </div>
            </div>
         </div>
         <!-- content -->
      </div>
   </div>

   <!-- footer -->
   <div class="col-12 d-none d-lg-block fixed-bottom">
      <p class="text-center">
         &copy; 2021 HunsTextiles.store All Rights Reserved
      </p>
   </div>
   <!-- footer -->

   <!-- popup modals -->
   <div class="modal fade" tabindex="-1" id="ConfirmEmailModel">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Verify Your Email</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-12">
                     <label class="form-label">Verification Code</label>
                     <input class="form-control" type="text" id="evc">
                  </div>
                  <div class="col-12">
                     <label class="form-label">Didn't Recieve the email?<a class="link-primary" onclick="VerifyEmail()"> Send Again</a></label>
                     
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary" onclick="signUp()">Submit</button>
            </div>
         </div>
      </div>
   </div>
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
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()" id="npbtn">Show</button>
                     </div>

                  </div>
                  <div class="col-12">
                     <label class="form-label">Confirm Password</label>
                     <div class="input-group mb-3">

                        <input class="form-control" type="password" id="rnp">
                        <button class="btn btn-outline-secondary" type="button" id="rnpbtn" onclick="togglePassword()">Show</button>
                     </div>
                  </div>
                  <div class="col-12">
                     <label class="form-label">Verification Code</label>
                     <input class="form-control" type="text" id="vc">
                  </div>
                  <div class="col-12">
                  <label class="form-label">Didn't Recieve the email?<a class="link-primary" onclick="forgotPassword()"> Send Again</a></label>
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
   <!-- popup modals -->
   <div class="spinner-bg" id="customSpinner">
        <div class="spinner-border text-white border-5 " style="width: 5rem; height: 5rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

   <script src="script.js"></script>
   <script src="bootstrap.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
<?php
}
?>
