<?php
require_once('config/orders.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>

    <div id="page">
        <?php
        require_once('category-block.php');
        ?>
        <div id="main-block">
            <?php
            $account = 1;
            require_once('header.php');
            require_once('config/connect.php');
            $idUser = $_SESSION['accountId'];
            $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$idUser'");
            $usersData = mysqli_fetch_assoc($usersData);

            ?>
            <div id="breadcrumbs_block">
                <a href="index.php" class="crumb">Главная</a>
                <span>/</span>
                <a href="" class="crumb active_crumb">Аккаунт</a>
            </div>
            <div id="account-body-block">
                <div class="title_account">
                    Аккаунт
                </div>
                <div id="info-client-block">
                    <form action="" id="account-form">
                        <div class="title_info_account">
                            Информация о пользователе
                        </div>
                        <div class="line-form">
                            <p class="name-input">Имя:</p>
                            <input class="input-user-form" type="text" id="nameUser" name="nameUser" value="<?= $usersData['NAME'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Email:</p>
                            <input class="input-user-form" type="text" id="mailUser" name="mailUser" value="<?= $usersData['MAIL'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Телефон:</p>
                            <input class="input-user-form" type="text" id="numberUser" name="numberUser" value="<?= $usersData['NUMBER'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Город:</p>
                            <input class="input-user-form" type="text" id="cityUser" name="cityUser" value="<?= $usersData['CITY'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Адрес доставки:</p>
                            <input class="input-user-form" type="text" id="addressUser" name="addressUser" value="<?= $usersData['ADDRESS'] ?>">
                        </div>
                        <input class="add_order" type="button" value="Обновить" onclick="updAccount()">
                    </form>
                </div>
                <div id="orders_block">
                    <div class="title_info_account">
                        Мои заказы
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td class="date">Дата и время</td>
                                <td class="number_order">Заказ</td>
                                <td class="status">Статус</td>
                                <td class="amount">Сумма</td>
                                <td class="client_info">Имя</td>
                                <td class="more_info"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            addOrdersTableUser($OrdersTable, $idUser);
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
                Состояние:
                <span>Отменен</span>
            </p>
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
                            <td class="img-orders-basket"><img src="img/product/1.png" alt=""></td>
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
                            <td class="img-orders-basket"><img src="img/product/1.png" alt=""></td>
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
                            <td class="img-orders-basket"><img src="img/product/1.png" alt=""></td>
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
                            <td class="img-orders-basket"><img src="img/product/1.png" alt=""></td>
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
            <a href="#close">
                <img src="img/main/close-svgrepo-com.png" alt="" class="close-basket">
            </a>
        </div> -->
    </div>
</body>

<script src="script/account.js"></script>
<script src="script/orders.js"></script>

</html>