<?php
session_start();
if (isset($account) && (!isset($_SESSION['accountName']) || $_SESSION['accountName'] !== 'user')) {
    header('Location: index.php');
}
if (isset($order) && (!isset($_SESSION['basket']) || $_SESSION['basket'] == [])) {
    header('Location: index.php');
}
if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'admin') {
    header('Location: admin');
}
require_once('config/basket.php');
?>

<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="css/header.css">

<div id="modal-basket">
    <a href="#close">
    </a>
    <div id="modal-block-basket">
        <h1 class="title-basket">
            Моя корзина
        </h1>
        <form id="basket-form" action="">
            <table>
                <tbody>
                    <?php
                    if (isset($_SESSION['basket']) && isset($_SESSION['basketSum']) && isset($_SESSION['countBasket'])) {
                        addTableBassket($BasketTable, $TableProdAll, $PhotosProdList);
                    }
                    ?>
                </tbody>
            </table>
        </form>
        <div id="price-line-basket">
            <span class="text-amount-price-basket">Сумма товаров</span>
            <?php
            if (isset($_SESSION['basketSum']) && $_SESSION['basketSum'] !== '') {
                // echo number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ';
            } else {
                echo '0';
            }
            ?><span class="rub">руб</span>
        </div>
        <div id="basket-button-block">
            <a href="#close">
                <button class="back-basket">Вернуться к покупкам</button>
                <span class="left-img">
                    <img src="img/main/left-2-svgrepo-com.png" alt="">
                </span>
            </a>
            <a href="orders.php"><button class="order-basket">Оформить заказ</button></a>
        </div>
        <a href="#close">
            <img src="img/main/close-svgrepo-com.png" alt="" class="close-basket">
        </a>
    </div>
</div>

<div id="header-block">
    <div id="logo-block">
        <a href="index.php">
            <img src="img/main/logotype.png" alt="">
        </a>
    </div>
    <div id="menu-block">
        <div id="linck-catalog">
            <a href="catalog.php?idCat=" class="catalog-link">Каталог</a>
        </div>
        <form action="search.php" id="search-form" method="get">
            <input type="search" name="search" id="search">
            <button type="submit" id="search-button">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </form>
    </div>
    <a href="#modal-basket" id="basket-link">
        <?php
        if (isset($_SESSION['basketSum']) && isset($_SESSION['countBasket'])) {
        ?>
            <div id="basket-block">
                <img src="img/main/cart-shopping-svgrepo-com (1).png" alt="">
                <span class="basket-text">Козина</span>
                <span class="basket-text">(<?= $_SESSION['countBasket'] ?>) /</span>
                <span class="basket-text"><?= number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ' ?></span>
                <span class="basket-text">руб.</span>
            </div>
        <?php
        } else {
        ?>
            <div id="basket-block">
                <img src="img/main/cart-shopping-svgrepo-com (1).png" alt="">
                <span class="basket-text">Козина</span>
                <span class="basket-text">(0) /</span>
                <span class="basket-text">0</span>
                <span class="basket-text">руб.</span>
            </div>

        <?php
        }
        ?>
    </a>
</div>