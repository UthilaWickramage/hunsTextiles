<?php

$product = Database::select("SELECT * FROM `product_details` ORDER BY `datetime_added` DESC LIMIT 3");
$productnum = $product->num_rows;

?>
<div style=" padding: 25px;">

    <div>
        <table style="border-collapse: collapse; width: 100%;">
            <tr style="font-size: 30px; font-weight: bolder;">
                <th style="border: 1px solid black; padding: 20px;"></th>
                <th style="border: 1px solid black; padding: 20px;">Item</th>
                <th style="border: 1px solid black; padding: 20px;">Brand</th>
                <th style="border: 1px solid black; padding: 20px;">Price</th>
            </tr>
            <?php
            for ($i = 0; $i < $productnum; $i++) {
                $productrs = $product->fetch_assoc();

            ?>
                <tr style="font-size: 20px;">
                    <td style="border: 1px solid black; padding: 10px;"><img height="100px" width="auto" src="https://files.fm/thumb_show.php?i=rtd365gjv" alt=""></td>
                    <td style="border: 1px solid black; padding: 20px;"><?php echo $productrs["title"] ?></td>
                    <td style="border: 1px solid black; padding: 20px;"><?php echo $productrs["bname"] ?></td>
                    <td style="border: 1px solid black; padding: 20px;">Rs. <?php echo $productrs["price"] ?>.00</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

</div>
</body>

</html>