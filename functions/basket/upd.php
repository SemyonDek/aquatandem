<?php
require_once('../../config/connect.php');
session_start();

$id = $_POST['id'];
$value = $_POST['value'];

if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
    $basket = $_SESSION['basket'];
} else $basket = [];

$basket[$id]['VALUE'] = (int)$value;
$basket[$id]['AMOUNT'] = (int)$basket[$id]['PRICE'] * $basket[$id]['VALUE'];

$_SESSION['basket'] = $basket;

$sum = 0;
$countBasket = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $countBasket += $value['VALUE'];
    $sum += $value['AMOUNT'];
}

$_SESSION['basketSum'] = $sum;
$_SESSION['countBasket'] = $countBasket;

require_once('../../config/basket.php');

?>
<div id="basket-block">
    <img src="img/main/cart-shopping-svgrepo-com (1).png" alt="">
    <span class="basket-text">Козина</span>
    <span class="basket-text">(<?= $_SESSION['countBasket'] ?>) /</span>
    <span class="basket-text"><?= number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ' ?></span>
    <span class="basket-text">руб.</span>
</div>

<form id="basket-form" action="">
    <table>
        <tbody>
            <?php
            addTableBassket($BasketTable, $TableProdAll, $PhotosProdList)
            ?>
        </tbody>
    </table>
</form>

<div id="price-line-basket">
    <span class="text-amount-price-basket">Сумма товаров</span>
    <?php
    if (isset($_SESSION['basketSum'])) {
        echo number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ';
    } else {
        echo '0';
    }
    ?><span class="rub">руб</span>
</div>