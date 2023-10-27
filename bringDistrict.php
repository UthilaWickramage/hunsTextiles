<?php
require "connection.php";

if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];

    $brs = Database::select("SELECT * FROM district WHERE `province_id`= '" . $pid . "'");
    $brn = $brs->num_rows;
    if ($brn > 0) {
        for ($i = 0; $i < $brn; $i++) {
            $dis = $brs->fetch_assoc();
?>
            <option value="<?php echo $dis["id"] ?>"><?php echo $dis["name"] ?></option>

        <?php
        }
    } else {
        ?>
        <option>No Districts to display</option>

        <?php
    }
} else if (isset($_GET["did"])) {
    $did = $_GET["did"];

    $drs = Database::select("SELECT * FROM city WHERE `district_id`= '" . $did . "'");
    $drn = $drs->num_rows;
    if ($drn > 0) {
        for ($i = 0; $i < $drn; $i++) {
            $cis = $drs->fetch_assoc();
        ?>
            <option value="<?php echo $cis["id"] ?>"><?php echo $cis["name"] ?></option>

        <?php
        }
    } else {
        ?>
        <option>No Cities to display</option>

<?php
    }
} else if (isset($_GET["bid"])) {
    $category = $_GET["bid"];

    $bhmrs = Database::select("SELECT * FROM `sub_category_has_category` WHERE `category_id`='".$category."'");
    $bhmn = $bhmrs->num_rows;

    if($bhmn>0){
        for($i=0;$i<$bhmn;$i++){
            $bhmr = $bhmrs->fetch_assoc();

            $brandrs = Database::select("SELECT * FROM `sub_category` WHERE `id`='".$bhmr["sub_category_id"]."'");
            $brn = $brandrs->num_rows;
            if ($brn > 0) {
                
                    $brandr = $brandrs->fetch_assoc();
                ?>
                    <option value="<?php echo $brandr["id"] ?>"><?php echo $brandr["name"] ?></option>
        
                <?php
            
            } else {
                ?>
                
        
        <?php
            }
        }
    }else{
        echo "nocities";
    }
}


?>