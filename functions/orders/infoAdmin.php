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
                    addOrdersInfoAdmin($idOrder, $OrdersItemTable, $TableProdAll, $PhotosProdList);
                    ?>
                </tbody>
            </table>
        </div>
        <div id="price-line-basket">
            <span class="text-amount-price-basket">Сумма заказа</span>
            <?= number_format($OrderTable['AMOUNT'], 0, '.', ' ') . ' ' ?> <span class="rub">руб</span>
        </div>
        <div id="basket-button-block">
            <select name="statusOrder" id="statusOrder">
                <option value="1" <?php if ($OrderTable['STATUS'] == 1) echo 'selected="selected"' ?>>В обработке</option>
                <option value="2" <?php if ($OrderTable['STATUS'] == 2) echo 'selected="selected"' ?>>В доставке</option>
                <option value="3" <?php if ($OrderTable['STATUS'] == 3) echo 'selected="selected"' ?>>Выполнен</option>
                <option value="4" <?php if ($OrderTable['STATUS'] == 4) echo 'selected="selected"' ?>>Отменен</option>
            </select>
            <button class="order-basket" onclick="updOrder(<?= $idOrder ?>)">Изменить состояние</button>
        </div>
        <a href="#close">
            <img src="../img/main/close-svgrepo-com.png" alt="" class="close-basket">
        </a>
    </div>
</div>