<?php
require_once('../../config/connect.php');

$idProd = $_POST['idProd'];

mysqli_query($ConnectDatabase, "DELETE FROM products WHERE `products`.`ID` = $idProd");

$Photos = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE `IDPROD`='$idProd'");
$Photos = mysqli_fetch_all($Photos, MYSQLI_ASSOC);

$length = count($Photos);
for ($i = 0; $i < $length; $i++) {
    unlink('../../' . $Photos[$i]['SRC']);
}

mysqli_query($ConnectDatabase, "DELETE FROM products_color WHERE `products_color`.`IDPROD` = $idProd");
mysqli_query($ConnectDatabase, "DELETE FROM products_img WHERE `products_img`.`IDPROD` = $idProd");
mysqli_query($ConnectDatabase, "DELETE FROM products_new WHERE `products_new`.`IDPROD` = $idProd");
mysqli_query($ConnectDatabase, "DELETE FROM products_sale WHERE `products_sale`.`IDPROD` = $idProd");

require_once('../../config/product.php');

?>

<div id="list-product-block">
    <?php
    addListProdAdmin($ProductTable, $PhotosProdList);
    ?>
</div>