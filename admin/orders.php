<?php
require_once('../config/orders.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../css/orders-admin.css">
</head>

<body>


    <div id="page">
        <?php
        require_once('category-block.php');
        ?>
        <div id="main-block">
            <?php
            require_once('header.php');
            ?>
            <div id="orders_block">
                <h1 class="orders_block_name">Список заказов</h1>
                <table>
                    <thead>
                        <tr>
                            <td class="date">Дата и время</td>
                            <td class="number_order">Заказ</td>
                            <td class="status">Статус</td>
                            <td class="amount">Сумма</td>
                            <td class="client_info">Покупатель</td>
                            <td class="more_info"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        addOrdersTableAdmin($OrdersTable);
                        ?>
                        <!-- <tr>
                            <td class="date">09.02.2016 19:06</td>
                            <td class="number_order">№1</td>
                            <td class="status">Отменен</td>
                            <td class="amount">100 000 руб.</td>
                            <td class="client_info">Иванов Иван</td>
                            <td class="more_info"><a href="#orders-info">Подробнее</a></td>
                        </tr> -->
                    </tbody>
                </table>

            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>

    <div id="orders-info">
        <a href="#close">
        </a>
        <!-- <div id="modal-block-basket">
            <h1 class="title-basket">
                Заказ №1
            </h1>
            <p class="info-client">
                Имя:
                <span>Иванов Иван</span>
            </p>
            <p class="info-client">
                Email:
                <span>Иванов Иван</span>
            </p>
            <p class="info-client">
                Телефон:
                <span>Иванов Иван</span>
            </p>
            <p class="info-client">
                Город:
                <span>Иванов Иван</span>
            </p>
            <p class="info-client">
                Адрес доставки:
                <span>Иванов Иван</span>
            </p>
            <div class="block-orders-basket">
                <table>
                    <tbody>
                        <tr>
                            <td class="img-orders-basket"><img src="../img/product/1.png" alt=""></td>
                            <td class="name-orders-basket">
                                <p>Аквариум настенный 1000</p>
                                <span class="color-order-basket">Черный</span>
                            </td>
                            <td class="value-orders-basket">
                                12 шт.
                            </td>
                            <td class="amount-orders-basket">1000 руб </td>
                        </tr>
                        <tr>
                            <td class="img-orders-basket"><img src="../img/product/1.png" alt=""></td>
                            <td class="name-orders-basket">
                                <p>Аквариум настенный 1000</p>
                                <span class="color-order-basket">Черный</span>
                            </td>
                            <td class="value-orders-basket">
                                12 шт.
                            </td>
                            <td class="amount-orders-basket">1000 руб </td>
                        </tr>
                        <tr>
                            <td class="img-orders-basket"><img src="../img/product/1.png" alt=""></td>
                            <td class="name-orders-basket">
                                <p>Аквариум настенный 1000</p>
                                <span class="color-order-basket">Черный</span>
                            </td>
                            <td class="value-orders-basket">
                                12 шт.
                            </td>
                            <td class="amount-orders-basket">1000 руб </td>
                        </tr>
                        <tr>
                            <td class="img-orders-basket"><img src="../img/product/1.png" alt=""></td>
                            <td class="name-orders-basket">
                                <p>Аквариум настенный 1000</p>
                                <span class="color-order-basket">Черный</span>
                            </td>
                            <td class="value-orders-basket">
                                12 шт.
                            </td>
                            <td class="amount-orders-basket">1000 руб </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="price-line-basket">
                <span class="text-amount-price-basket">Сумма заказа</span>
                60000 <span class="rub">руб</span>
            </div>
            <div id="basket-button-block">
                <select name="" id="">
                    <option value="1">В обработке</option>
                    <option value="2">В доставке</option>
                    <option value="3">Выполнен</option>
                    <option value="4">Отменен</option>
                </select>
                <button class="order-basket">Изменить состояние</button>
            </div>
            <a href="#close">
                <img src="../img/main/close-svgrepo-com.png" alt="" class="close-basket">
            </a>
        </div> -->
    </div>
</body>

<script src="../script/orders.js"></script>

</html>