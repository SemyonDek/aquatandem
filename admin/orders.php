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
    </div>
</body>

<script src="../script/orders.js"></script>

</html>