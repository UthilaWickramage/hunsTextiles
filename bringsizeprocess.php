<?php
require "connection.php";

$cid = $_GET["cid"];

$shmrs = Database::select("SELECT * FROM `category_has_size` WHERE `category_id`='" . $cid . "'");
$shmn = $shmrs->num_rows;
echo $shmn;
if ($shmn > 0) {
    for ($i = 0; $i < $shmn; $i++) {
        $shmr = $shmrs->fetch_assoc();

        $shasrs = Database::select("SELECT * FROM `size` WHERE `id`='" . $shmr["size_id"] . "'");
        $shasn = $shasrs->num_rows;
        if ($shasn > 0) {
            
                $shasrow = $shasrs->fetch_assoc();
?>
                <option value="<?php echo $shasrow["id"] ?>"><?php echo $shasrow["name"] ?></option>

            <?php
            
        } else {
            ?>


<?php
        }
    }
} else {
    echo "1";
}
?>