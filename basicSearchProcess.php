<?php

require "connection.php";

$searchText = $_POST["txt"];
$searchSelect = $_POST["select"];
$results_per_page = 5;
$pageno = $_POST["page"];


if (!empty($searchText)  && $searchSelect == 0) {
    $selectrs = Database::select("SELECT * FROM `product_details` WHERE `title` LIKE '%" . $searchText . "%'");
    $btnnum = $selectrs->num_rows;

    $number_of_pages = ceil($btnnum / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $textSearch = Database::select("SELECT * FROM `product_details` WHERE `title` LIKE '%" . $searchText . "%'  LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    $rn = $textSearch->num_rows;

    if ($rn != 0) {
       

        for ($i = 0; $i < $rn; $i++) {
            $rf = $textSearch->fetch_assoc();
            ?>
               <div class="card mb-3 col-12 col-lg-8 offset-0 offset-lg-2 mt-3">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                            <?php
                                                            

                                                            
                                                            ?>
                                                            <img src="<?php echo $rf["code"] ?>" style="height:200px ; width: auto;" class=" rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $rf["title"] ?></h5>
                                                                <span class="fw-bold text-black-50">Color : <?php echo $rf["colname"]?></span> &nbsp; |
                                                                &nbsp;<span class="fw-bold text-black-50">Condition : <?php echo $rf["colname"]?></span>
                                                                <br>
                                                                <span class="fw-bold text-black-50 fs-5"> Price : &nbsp;</span>
                                                                <span class="fs-5">Rs. <?php echo $rf["price"] ?>.00</span>
                                                                <hr>
                                                                <span class="fw-bold text-black-50"> Brand : &nbsp;</span>
                                                                <br>
                                                                
                                                                <span class=""><?php echo $rf["bname"] ?></span>
                                                                
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card-body d-grid">
                                                                <a href="<?php echo "singleProductView.php?pid=" . ($rf["pid"]); ?>" class="btn btn-outline-success mb-2">Buy Now</a>
                                                                <a href="" class="btn btn-outline-secondary mb-2">Add to Cart</a>
                                                                
                                                                <a href="" class="btn btn-outline-danger mb-2" onclick="addToWishlist(<?php echo $rf['pid']?>)">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        <?php

            } 
        
        ?>

    <nav class="float-end mt-4">
        <ul class="pagination">

            <?php
            if ($pageno != 1) {
            ?>
                <li class="page-item"><a onclick="basicSearch(<?php echo $pageno - 1 ?>)" class="page-link">Next</a></li>
            <?php

            }
            ?>


            <?php
            for ($i = 1; $i <= $number_of_pages; $i++) {
                if ($i == $pageno) {
            ?>
                    <li class="page-item active"><a class="page-link" onclick="basicSearch(<?php echo $i ?>)"><?php echo $i ?></a></li>
                <?php
                } else {
                ?>
                    <li class="page-item"><a class="page-link" onclick="basicSearch(<?php echo $i ?>)"><?php echo $i ?></a></li>

            <?php
                }
            }

            ?>

             <?php
                                    if ($pageno != $number_of_pages) {
                                    ?> <li class="page-item"><a onclick="basicSearch(<?php echo $pageno + 1 ?>)" class="page-link">Next</a></li>
        <?php
                                    }
        ?>
        </ul>
                                </nav>


<?php
    } else {
        ?>
        <div class="col-12 mb-5 mt-5 text-center">
            <label class="text-secondary fs-1 fw-bold" href="#">No Products Found</label>
        </div>

        <?php
    }
} else if ($searchSelect != 0 && empty($searchText)) {
    

    $selectrs = Database::select("SELECT * FROM `product_details` WHERE `cid`='" . $searchSelect . "'");
    $btnnum = $selectrs->num_rows;

    $number_of_pages = ceil($btnnum / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;

    $res = Database::select("SELECT * FROM `product_details` WHERE `cid`='" . $searchSelect . "'  LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    $rn = $res->num_rows;
    if ($rn != 0) {
       

        for ($i = 0; $i < $rn; $i++) {
            $rf = $res->fetch_assoc();
            ?>
               <div class="card mb-3 col-12 col-lg-8 offset-0 offset-lg-2 mt-3">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                            <?php
                                                            

                                                            
                                                            ?>
                                                            <img src="<?php echo $rf["code"] ?>" style="height:200px ; width: auto;" class=" rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $rf["title"] ?></h5>
                                                                <span class="fw-bold text-black-50">Color : <?php echo $rf["colname"]?></span> &nbsp; |
                                                                &nbsp;<span class="fw-bold text-black-50">Condition : <?php echo $rf["colname"]?></span>
                                                                <br>
                                                                <span class="fw-bold text-black-50 fs-5"> Price : &nbsp;</span>
                                                                <span class="fs-5">Rs. <?php echo $rf["price"] ?>.00</span>
                                                                <hr>
                                                                <span class="fw-bold text-black-50"> Brand : &nbsp;</span>
                                                                <br>
                                                                
                                                                <span class=""><?php echo $rf["bname"] ?></span>
                                                                
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card-body d-grid">
                                                                <a href="<?php echo "singleProductView.php?pid=" . ($rf["pid"]); ?>" class="btn btn-outline-success mb-2">Buy Now</a>
                                                                <a href="" class="btn btn-outline-secondary mb-2">Add to Cart</a>
                                                                
                                                                <a href="" class="btn btn-outline-danger mb-2" onclick="addToWishlist(<?php echo $rf['pid']?>)">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        <?php

            } 
        
        ?>

    <nav class="text-center mt-4">
        <ul class="pagination">

            <?php
            if ($pageno != 1) {
            ?>
                <li class="page-item"><a onclick="basicSearch(<?php echo $pageno - 1 ?>)" class="page-link">Next</a></li>
            <?php

            }
            ?>


            <?php
            for ($i = 1; $i <= $number_of_pages; $i++) {
                if ($i == $pageno) {
            ?>
                    <li class="page-item active"><a class="page-link" onclick="basicSearch(<?php echo $i ?>)"><?php echo $i ?></a></li>
                <?php
                } else {
                ?>
                    <li class="page-item"><a class="page-link" onclick="basicSearch(<?php echo $i ?>)"><?php echo $i ?></a></li>

            <?php
                }
            }

            ?>

             <?php
                                    if ($pageno != $number_of_pages) {
                                    ?> <li class="page-item"><a onclick="basicSearch(<?php echo $pageno + 1 ?>)" class="page-link">Next</a></li>
        <?php
                                    }
        ?>
        </ul>
                                </nav>


<?php
    } else {
        ?>
        <div class="col-12 mb-5 mt-5 text-center">
            <label class="text-secondary fs-1 fw-bold" href="#">No Products Found</label>
        </div>
        <?php
    }
} else if (!empty($searchText) && $searchSelect != 0) {
    $selectrs = Database::select("SELECT * FROM `product_details` WHERE `cid`='" . $searchSelect . "' AND `title` LIKE '%" . $searchText . "%'");
    $btnnum = $selectrs->num_rows;

    $number_of_pages = ceil($btnnum / $results_per_page);


    $page_first_result = ((int)$pageno - 1) * $results_per_page;


    $res = Database::select("SELECT * FROM `product_details` WHERE `cid`='" . $searchSelect . "' AND `title` LIKE '%" . $searchText . "%'  LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    $rn = $res->num_rows;
?>
<div class="row g-2">
<?php
  if ($rn != 0) {
       

    for ($i = 0; $i < $rn; $i++) {
        $rf = $res->fetch_assoc();
        ?>
           <div class="card mb-3 col-12 col-lg-8 offset-0 offset-lg-2 mt-3">
                                                <div class="row g-0">
                                                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                        <?php
                                                        

                                                        
                                                        ?>
                                                        <img src="<?php echo $rf["code"] ?>" style="height:200px ; width: auto;" class=" rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo $rf["title"] ?></h5>
                                                            <span class="fw-bold text-black-50">Color : <?php echo $rf["colname"]?></span> &nbsp; |
                                                            &nbsp;<span class="fw-bold text-black-50">Condition : <?php echo $rf["colname"]?></span>
                                                            <br>
                                                            <span class="fw-bold text-black-50 fs-5"> Price : &nbsp;</span>
                                                            <span class="fs-5">Rs. <?php echo $rf["price"] ?>.00</span>
                                                            <hr>
                                                            <span class="fw-bold text-black-50"> Brand : &nbsp;</span>
                                                            <br>
                                                            
                                                            <span class=""><?php echo $rf["bname"] ?></span>
                                                            
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card-body d-grid">
                                                            <a href="<?php echo "singleProductView.php?pid=" . ($rf["pid"]); ?>" class="btn btn-outline-success mb-2">Buy Now</a>
                                                            
                                                            
                                                            <a href="" class="btn btn-outline-danger mb-2" onclick="addToWishlist(<?php echo $rf['pid']?>)">Add to Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    <?php

        } 
    
    ?>

<nav class="float-end mt-4">
    <ul class="pagination">

        <?php
        if ($pageno != 1) {
        ?>
            <li class="page-item"><a onclick="basicSearch(<?php echo $pageno - 1 ?>)" class="page-link">Next</a></li>
        <?php

        }
        ?>


        <?php
        for ($i = 1; $i <= $number_of_pages; $i++) {
            if ($i == $pageno) {
        ?>
                <li class="page-item active"><a class="page-link" onclick="basicSearch(<?php echo $i ?>)"><?php echo $i ?></a></li>
            <?php
            } else {
            ?>
                <li class="page-item"><a class="page-link" onclick="basicSearch(<?php echo $i ?>)"><?php echo $i ?></a></li>

        <?php
            }
        }

        ?>

         <?php
                                if ($pageno != $number_of_pages) {
                                ?> <li class="page-item"><a onclick="basicSearch(<?php echo $pageno + 1 ?>)" class="page-link">Next</a></li>
    <?php
                                }
    ?>
    </ul>
                            </nav>


<?php
} else {
    ?>
    <div class="col-12 mb-5 mt-5 text-center">
        <label class="text-secondary fs-1 fw-bold" href="#">No Products Found</label>
    </div>
</div>
<?php
}
    }else{
        echo "1";
    }

