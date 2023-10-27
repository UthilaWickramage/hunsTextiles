<?php
require "connection.php";
$uemail = $_GET["email"];

$admin = Database::select("SELECT * FROM `admin`");
$adminrs = $admin->fetch_assoc();
$aemail = $adminrs["admin_email"];

$selectmessage = Database::select("SELECT * FROM `admin_user_chat` WHERE `from`='" . $uemail . "' OR `to`='" . $uemail . "' ");
$selectmnum = $selectmessage->num_rows;

if ($selectmnum == 0) {
?>
    <div class="col-12 mt-5 text-center">
        <img src="./resources/5305159_bubble_chat_facebook_messenger_messenger logo_icon.png" alt="" height="100px" width="auto" style="opacity: 0.4;">
        <h4 class="text-black-50">No Messages</h4>
    </div>

    <?php
} else {
    for ($i = 0; $i < $selectmnum; $i++) {
        $selectrs = $selectmessage->fetch_assoc();

        if (($selectrs["from"] == $uemail)) {
    ?>
            <div class="col-12">
                <div class="row">
                    <div class="col-5 alert alert-primary">
                        <div class="row">
                           
                            <div class="col-12">
                                <span class="fw-bolder">Me:</span><br>
                                <span><?php echo $selectrs["chat"] ?></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="col-12">
                <div class="row">
                    <div class="col-5 offset-7 text-end alert alert-danger">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-bolder">Admin:</span><br>
                                <span><?php echo $selectrs["chat"] ?></span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
}
