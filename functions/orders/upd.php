<?php
require_once('../../config/connect.php');
$id = $_POST['id'];
$status = $_POST['status'];
mysqli_query($ConnectDatabase, "UPDATE `orders` SET `STATUS` = '$status' WHERE `orders`.`ID` = $id");

require_once('../../config/orders.php');
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