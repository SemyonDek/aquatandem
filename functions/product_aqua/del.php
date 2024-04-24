<?php
require_once('../../config/connect.php');

$idAqua = $_POST['idAqua'];
$itemAqua = mysqli_query($ConnectDatabase, "SELECT * FROM `product_aqua` WHERE `ID`='$idAqua'");
$itemAqua = mysqli_fetch_assoc($itemAqua);
unlink('../../' . $itemAqua['SRC']);

mysqli_query($ConnectDatabase, "DELETE FROM product_aqua WHERE `product_aqua`.`ID` = $idAqua");


require_once('../../config/product_aqua.php');
?>

<div id="accessories_prod">
    <?php
    addAquaAdmin($AquaTable);
    ?>
</div>