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
        <title>Admin | Attributes</title>
        <link rel="icon" href="./resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap2.css">
        <link rel="stylesheet" href="ui.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>

    <body style=" height: 100vh;">
    <a class="btn btn-danger" onclick="topFunction()" id="goToTopBtn">&uarr;</a>

<?php
        require "./components/aside.php";
        ?>

        

        <main class="main-wrap">
            <section class="content-main" style="max-width:1200px">
                <div class="content-header">
                    <h2 class="content-title"> Product Attributes </h2>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h4>Add Sub Categories</h4>
                    </div>
                    <div class="col-12 mt-3 mb-3">
                        <div class="row g-1">
                            <?php
                            $rs = Database::select("SELECT * FROM `sub_category`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $row = $rs->fetch_assoc();
                            ?>
                                <div class="col-12 col-lg-3">
                                    <div class="row g-1 px-1">
                                        <div class="col-12 text-center alert alert-success border border-2 border-success shadow rounded">
                                            <label class="form-label"><?php echo $row["name"] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div onclick="addnewSCategoryModal()" style="cursor: pointer;" class="col-12 col-lg-3">
                                <div class="row g-1 px-1">
                                    <div class="col-12 text-center alert alert-danger border border-2 border-danger shadow rounded">
                                        <div class="row">

                                            <div class="col-12 text-center ">
                                                <label class="form-label fw-bold text-danger">Add New Sub Category</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <h4>Add Colors</h4>
                    </div>
                    <div class="col-12 mt-3 mb-3">
                        <div class="row g-1">
                            <?php
                            $rs = Database::select("SELECT * FROM `color`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $row = $rs->fetch_assoc();
                            ?>
                                <div class="col-12 col-lg-3">
                                    <div class="row g-1 px-1">
                                        <div class="col-12 text-center alert alert-primary border border-2 border-primary shadow rounded">
                                            <label class="form-label"><?php echo $row["name"] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div onclick="addnewColorModal()" style="cursor: pointer;" class="col-12 col-lg-3">
                                <div class="row g-1 px-1">
                                    <div class="col-12 text-center alert alert-danger border border-2 border-danger shadow rounded">
                                        <div class="row">

                                            <div class="col-12 text-center ">
                                                <label class="form-label fw-bold text-danger">Add New Color</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <h4>Add Brands</h4>
                    </div>
                    <div class="col-12 mt-3 mb-3">
                        <div class="row g-1">
                            <?php
                            $rs = Database::select("SELECT * FROM `brand`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $row = $rs->fetch_assoc();
                            ?>
                                <div class="col-12 col-lg-3">
                                    <div class="row g-1 px-1">
                                        <div class="col-12 text-center alert alert-secondary border border-2 border-secondary shadow rounded">
                                            <label class="form-label"><?php echo $row["name"] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div onclick="addnewBrandModal()" style="cursor: pointer;" class="col-12 col-lg-3">
                                <div class="row g-1 px-1">
                                    <div class="col-12 text-center alert alert-danger border border-2 border-danger shadow rounded">
                                        <div class="row">

                                            <div class="col-12 text-center ">
                                                <label class="form-label fw-bold text-danger">Add New Brand</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> <!-- row end// -->







            </section> <!-- content-main end// -->
        </main>
        <!-- Modal -->
        <div class="modal fade" id="addnewSCModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Sub Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">New Sub Category</label>
                        <input type="text" class="form-control" id="nsc">
                        <label class="form-label">Pick the Category</label>
                        <select id="cat-select" class="form-select">
                            <?php
                            $cars = Database::select("SELECT * FROM category");
                            $cnum = $cars->num_rows;

                            for ($x = 0; $x < $cnum; $x++) {
                                $crow = $cars->fetch_assoc();
                            ?>
                                <option value="<?php echo $crow["id"] ?>"><?php echo $crow["name"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveSubCategory()">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addnewColorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Color</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">New color</label>
                        <input type="text" class="form-control" id="nco">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveColor()">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addnewBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">New Brand</label>
                        <input type="text" class="form-control" id="nbr">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveBrand()">Submit</button>
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
    
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
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
?>