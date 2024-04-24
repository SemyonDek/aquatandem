<?php
require_once('../../config/orders.php');
$idOrder = $_POST['id'];
$OrderTable = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE `ID`='$idOrder'");
$OrderTable = mysqli_fetch_assoc($OrderTable);

?>
<div id="orders-info">
    <a href="#close">
    </a>
    <div id="modal-block-basket">
        <h1 class="title-basket">
            Заказ №<?= $idOrder ?>
        </h1>
        <p class="info-client">
            Имя:
            <span><?= $OrderTable['NAME'] ?></span>
        </p>
        <p class="info-client">
            Email:
            <span><?= $OrderTable['MAIL'] ?></span>
        </p>
        <p class="info-client">
            Телефон:
            <span><?= $OrderTable['NUMBER'] ?></span>
        </p>
        <p class="info-client">
            Город:
            <span><?= $OrderTable['CITY'] ?></span>
        </p>
        <p class="info-client">
            Адрес доставки:
            <span><?= $OrderTable['ADDRESS'] ?></span>
        </p>
        <div class="block-orders-basket">
            <table>
                <tbody>
                    <?php
                    addOrdersInfoUser($idOrder, $OrdersItemTable, $TableProdAll, $PhotosProdList);
                    ?>
                </tbody>
            </table>
        </div>
        <div id="price-line-basket">
            <span class="text-amount-price-basket">Сумма заказа</span>
            <?= number_format($OrderTable['AMOUNT'], 0, '.', ' ') . ' ' ?> <span class="rub">руб</span>
        </div>
        <a href="#close">
            <img src="../img/main/close-svgrepo-com.png" alt="" class="close-basket">
        </a>
    </div>
</div>