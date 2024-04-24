<?php
require_once('../../config/connect.php');

$idSlider = $_POST['idSlider'];
$itemSlider = mysqli_query($ConnectDatabase, "SELECT * FROM `banner` WHERE `ID`='$idSlider'");
$itemSlider = mysqli_fetch_assoc($itemSlider);
unlink('../../' . $itemSlider['SRC']);

mysqli_query($ConnectDatabase, "DELETE FROM banner WHERE `banner`.`ID` = $idSlider");


require_once('../../config/banner.php');
?>

<div id="img-banner-block">
    <?php
    addSliderAdmUpd($SliderList);
    ?>
</div>