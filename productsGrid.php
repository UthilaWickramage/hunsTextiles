<?php
session_start();
require "connection.php";

if (isset($_GET["c_id"])) {
    $cid = $_GET["c_id"];
    
    $crs = Database::select("SELECT * FROM `category` WHERE `id` = '" . $cid . "'");
    $cfr = $crs->fetch_assoc();
   
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $cfr["name"]?></title>
        <link rel="icon" href="./resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    </head>

    <body onload="productsGrid(1, <?php echo $cid ?>)">
        <div class="container-fluid">
            <div class="row">
                <?php require "./components/header.php" ?>
                <div class="col-12">
                    <div class="row" id="productDetails">
                        <div class="col-12 col-md-3 bg-light shadow">
                            <div class="row">
                                <div class="col-12 mt-3 fs-5 ">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Filters</label>
                                        </div>
                                        <div class="common-filter mt-3">
                                            <div class="fs-6 fw-bold text-uppercase mb-3">Pick Sub Category</div>

                                            <select class="form-select" id="sc" onchange="bringSubProducts(1, <?php echo $cid ?>)">
                                                <?php
                                                $schrs = Database::select("SELECT * FROM `sub_category_has_category` WHERE `category_id`='" . $cid . "'");
                                                $schnum = $schrs->num_rows;

                                                for ($y = 0; $y < $schnum; $y++) {
                                                    $schrow = $schrs->fetch_assoc();

                                                    $scrs = Database::select("SELECT * FROM `sub_category` WHERE `id`='" . $schrow["sub_category_id"] . "'");
                                                    $scrow = $scrs->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo $scrow["id"] ?>"><?php echo $scrow["name"] ?></option>
                                                <?php
                                                }


                                                ?>

                                            </select>

                                        </div>

                                        <div class="common-filter mt-3">
                                            <div class="fs-6 fw-bold text-uppercase mb-3">Pick Brand</div>

                                            <select class="form-select" id="br" onchange="bringBrand(1, <?php echo $cid ?>)">
                                                <?php
                                                $brs = Database::select("SELECT * FROM `brand`");
                                                $brnum = $brs->num_rows;

                                                for ($a = 0; $a < $brnum; $a++) {
                                                    $brow = $brs->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo $brow["id"] ?>"><?php echo $brow["name"] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                        </div>
                                        <div class="common-filter mt-3">
                                            <div class="fs-6 fw-bold text-uppercase mb-3">Pick Size</div>

                                            <select class="form-select" id="size" onchange="bringSize(1, <?php echo $cid ?>)">
                                                <?php
                                                $shc = Database::select("SELECT * FROM `category_has_size` WHERE `category_id`='" . $cid . "'");
                                                $shcnum = $shc->num_rows;
                                              
                                                for ($g = 0; $g < $shcnum; $g++) {
                                                    $shcrs = $shc->fetch_assoc();
                                                    $sizers = Database::select("SELECT * FROM `size` WHERE `id`='".$shcrs["size_id"]."'");
                                                    $sizerow = $sizers->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $sizerow["id"] ?>"><?php echo $sizerow["name"] ?></option>
                                                <?php
                                                }




                                                ?>



                                            </select>
                                        </div>

                                        <div class="common-filter mt-3">
                                            <div class="fs-6 fw-bold text-uppercase mb-3">Pick a Price Range</div>

                                            <input type="text" class="form-control mb-3" placeholder="Price from" id="pf">
                                            <input type="text" class="form-control " placeholder="price to" id="pt">

                                        </div>


                                        <div class="col-10 offset-1 mt-4 mb-3 d-grid">
                                            <button class="btn btn-sm btn-success mb-1" onclick="bringPriceRange(1, <?php echo $cid ?>)">
                                                Apply Price Range
                                            </button>
                                            <button class="btn btn-sm btn-primary" onclick="clearfilters()">
                                                Clear Filters
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row text-center py-2" style="background-color: #74EBD5; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);">
                                        
                                        <h2 class="text-white"><?php echo $cfr["name"] ?></h2>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row" id="probox">

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php require "./components/footer.php" ?>
        </div>
        </div>


        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </body>

    </html>

<?php
}
?>