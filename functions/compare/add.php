<?php
session_start();

$prod = [];
$prod['ID'] = $_POST['idProd'];

if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
    $comprasion = $_SESSION['comprasion'];
} else $comprasion = [];

array_push($comprasion, $prod);
$_SESSION['comprasion'] = $comprasion;
?>

<span id="srav_value">
    <?php
    if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
        echo ' ' . count($_SESSION['comprasion']) . ' ';
    } else echo 0;
    ?>
</span>