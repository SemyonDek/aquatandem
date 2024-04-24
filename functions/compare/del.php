<?php
session_start();

unset($_SESSION['comprasion']);

require_once('../../config/compare.php');

?>
<span id="srav_value">
    <?php
    if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
        echo ' ' . count($_SESSION['comprasion']) . ' ';
    } else echo 0;
    ?>
</span>

<div id="list-product-compare">
    <?php
    if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
        addListCompare($CompareTable, $TableProdAll, $PhotosProdList);
    }
    ?>
</div>