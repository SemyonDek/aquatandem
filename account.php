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
    </div>
</body>

<script src="script/account.js"></script>
<script src="script/orders.js"></script>

</html>