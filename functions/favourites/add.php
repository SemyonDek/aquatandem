<?php
require_once('../../config/connect.php');
session_start();
$idProd = $_POST['idProd'];
$idUser = $_SESSION['accountId'];
mysqli_query($ConnectDatabase, "INSERT INTO `favourites` (`ID`, `IDUSER`, `IDPROD`) VALUES (NULL, '$idUser', '$idProd')");

require_once('../../config/favourites.php');

?>

<span id="izb_value"><?= countFavourit($FavouritTable, $idUser) ?></span>