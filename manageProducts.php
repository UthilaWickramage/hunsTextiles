<?php

session_start();
require "connection.php";
$pageno;
if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Manage Products</title>
        <link rel="icon" href="./resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap2.css">
    <link rel="stylesheet" href="ui.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>

    <body style="overflow-x: hidden;" onload="manageProducts(1)">
    <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>
    <?php
    require "./components/aside.php";
    ?>

<main class="main-wrap">
        
        <section class="content-main">

            <div class="content-header">
                <h2 class="content-title">Products list </h2>
              
            </div>

            <div class="card mb-4">
                <header class="card-header">
                    <div class="row d-flex justify-content-end">
                        <div class="col-6">
                            <div class="input-group ms-2">
                                <input class="form-control" id="search" type="text" placeholder="Search by Title" >
                                <button class="btn btn-primary" onclick="manageProducts(1)">Search</button>
                            </div>
                        </div>
                        
                    </div>
                </header> <!-- card-header end// -->

                <div class="card-body" id="card-body">


                </div> <!-- card-body end// -->
            </div> <!-- card end// -->


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
    

                
              

                

               
           
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

<?php
}
?>