<?php
require_once('../../config/connect.php');
session_start();
$idProd = $_POST['idProd'];
$idUser = $_SESSION['accountId'];
mysqli_query($ConnectDatabase, "DELETE FROM `favourites` WHERE `favourites`.`ID` = $idProd");

require_once('../../config/favourites.php');
?>

<span id="izb_value"><?= countFavourit($FavouritTable, $idUser) ?></span>

<div id="list-product-block">
    <?php
    listFavourit($FavouritTable, $TableProdAll, $PhotosProdList);
    ?>
</div>