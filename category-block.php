<?php
require_once('config/category.php');
?>

<link rel="stylesheet" href="css/category-block.css">

<div id="category-block">
    <?php
    if (isset($_GET['idCat'])) {
        $idCat = $_GET['idCat'];
    } else {
        $idCat = '';
    }
    catListCatalog($CategoryTable, $idCat);
    ?>
</div>