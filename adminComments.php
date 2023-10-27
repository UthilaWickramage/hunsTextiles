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
        <title>Admin | Comments</title>
        <link rel="icon" href="./resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap2.css">
    <link rel="stylesheet" href="ui.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    </head>

    <body style="overflow-x: hidden;" onload="bringComments(1)">
    <?php
    require "./components/aside.php";
    ?>

<main class="main-wrap">
        
        <section class="content-main">

            <div class="content-header">
                <h2 class="content-title">Comments </h2>
              
            </div>

            <div class="card mb-4">
                

                <div class="card-body" id="card-body">

                   

                </div> <!-- card-body end// -->
            </div> <!-- card end// -->


        </section> <!-- content-main end// -->
    </main>
     


                
              

                

               
           
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
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
?>