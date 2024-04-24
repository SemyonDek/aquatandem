<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа</title>
    <link rel="stylesheet" href="css/orders.css">
</head>

<body>

    <div id="page">
        <?php
        require_once('category-block.php')
        ?>
        <div id="main-block">
            <?php
            $order = 1;
            require_once('header.php');
            ?>
            <div id="breadcrumbs_block">
                <a href="index.php" class="crumb">Главная</a>
                <span>/</span>
                <a href="" class="crumb active_crumb">Оформление заказа</a>
            </div>
            <div id="main-block-orders">
                <div class="title_orders">
                    Оформление заказа
                </div>
                <div id="info-client-block">
                    <form action="" id="orders-form">
                        <?php
                        if (isset($_SESSION['accountId'])) {
                            $idUser = $_SESSION['accountId'];
                            $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$idUser'");
                            $usersData = mysqli_fetch_assoc($usersData);
                        ?>
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

                        <?php
                        } else {
                        ?>
                            <div class="line-form">
                                <p class="name-input">Имя:</p>
                                <input class="input-user-form" type="text" id="nameUser" name="nameUser" value="">
                            </div>
                            <div class="line-form">
                                <p class="name-input">Email:</p>
                                <input class="input-user-form" type="text" id="mailUser" name="mailUser" value="">
                            </div>
                            <div class="line-form">
                                <p class="name-input">Телефон:</p>
                                <input class="input-user-form" type="text" id="numberUser" name="numberUser" value="">
                            </div>
                            <div class="line-form">
                                <p class="name-input">Город:</p>
                                <input class="input-user-form" type="text" id="cityUser" name="cityUser" value="">
                            </div>
                            <div class="line-form">
                                <p class="name-input">Адрес доставки:</p>
                                <input class="input-user-form" type="text" id="addressUser" name="addressUser" value="">
                            </div>

                        <?php

                        }
                        ?>
                        <input class="add_order" type="button" value="Оформить заказ" onclick="addOrders()">
                    </form>
                </div>
                <div id="basket-client-block">
                    <div class="title-orders-basket">
                        Мой заказ
                    </div>
                    <div class="block-orders-basket">
                        <table>
                            <tbody>
                                <?php
                                addTableBassketOrder($BasketTable, $TableProdAll, $PhotosProdList);
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="amount_orders">
                        <p class="price-item-prod">
                            К оплате:
                            <span class="price-value-item-prod">
                                <?= number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ' ?>
                                <span class="rub-item-prod">
                                    руб
                                </span>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>

</body>

<script src="script/orders.js"></script>

</html>