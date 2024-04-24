<?php
require_once('connect.php');

$OrdersTable = mysqli_query($ConnectDatabase, "SELECT * FROM `orders`");
$OrdersTable = mysqli_fetch_all($OrdersTable, MYSQLI_ASSOC);
$OrdersItemTable = mysqli_query($ConnectDatabase, "SELECT * FROM `order_item`");
$OrdersItemTable = mysqli_fetch_all($OrdersItemTable, MYSQLI_ASSOC);
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
$PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);

function addOrdersTableAdmin($OrdersTable)
{
    foreach ($OrdersTable as $itemOrders) {

?>
        <tr>
            <td class="date"><?= $itemOrders['DATE'] ?></td>
            <td class="number_order">№<?= $itemOrders['ID'] ?></td>
            <td class="status">
                <?php
                if ($itemOrders['STATUS'] == 1) echo 'В обработке';
                elseif ($itemOrders['STATUS'] == 2) echo 'В доставке';
                elseif ($itemOrders['STATUS'] == 3) echo 'Выполнен';
                elseif ($itemOrders['STATUS'] == 4) echo 'Отменен';
                ?>
            </td>
            <td class="amount"><?= number_format($itemOrders['AMOUNT'], 0, '.', ' ') . ' ' ?> руб.</td>
            <td class="client_info"><?= $itemOrders['NAME'] ?></td>
            <td class="more_info" onclick="addInfoOrderAdm(<?= $itemOrders['ID'] ?>)"><a href="#orders-info">Подробнее</a></td>
        </tr>
        <?php
    }
}
function addOrdersTableUser($OrdersTable, $idUser)
{
    foreach ($OrdersTable as $itemOrders) {
        if ($itemOrders['IDUSER'] == $idUser) {

        ?>
            <tr>
                <td class="date"><?= $itemOrders['DATE'] ?></td>
                <td class="number_order">№<?= $itemOrders['ID'] ?></td>
                <td class="status">
                    <?php
                    if ($itemOrders['STATUS'] == 1) echo 'В обработке';
                    elseif ($itemOrders['STATUS'] == 2) echo 'В доставке';
                    elseif ($itemOrders['STATUS'] == 3) echo 'Выполнен';
                    elseif ($itemOrders['STATUS'] == 4) echo 'Отменен';
                    ?>
                </td>
                <td class="amount"><?= number_format($itemOrders['AMOUNT'], 0, '.', ' ') . ' ' ?> руб.</td>
                <td class="client_info"><?= $itemOrders['NAME'] ?></td>
                <td class="more_info" onclick="addInfoOrderUser(<?= $itemOrders['ID'] ?>)"><a href="#orders-info">Подробнее</a></td>
            </tr>
            <?php

        }
    }
}

function addOrdersInfoAdmin($idOrder, $OrdersItemTable, $TableProdAll, $PhotosProdList)
{
    foreach ($OrdersItemTable as $itemOrdersItem) {
        if ($idOrder == $itemOrdersItem['IDORDER']) {
            foreach ($TableProdAll as $itemProd) {
                if ($itemProd['ID'] == $itemOrdersItem['IDPROD']) {
                    $imgSRC = '';
                    foreach ($PhotosProdList as $itemPhotos) {
                        if ($itemProd['ID'] == $itemPhotos['IDPROD']) {
                            $imgSRC = $itemPhotos['SRC'];
                            break;
                        }
                    }
            ?>
                    <tr>
                        <td class="img-orders-basket"><img src="../<?= $imgSRC ?>" alt=""></td>
                        <td class="name-orders-basket">
                            <p><?= $itemProd['NAME'] ?></p>
                            <span class="color-order-basket"><?= $itemOrdersItem['COLOR'] ?></span>
                        </td>
                        <td class="value-orders-basket">
                            <?= $itemOrdersItem['QUANTITY'] ?> шт.
                        </td>
                        <td class="amount-orders-basket"><?= number_format($itemOrdersItem['AMOUNT'], 0, '.', ' ') . ' ' ?> руб</td>
                    </tr>
                <?php
                }
            }
        }
    }
}

function addOrdersInfoUser($idOrder, $OrdersItemTable, $TableProdAll, $PhotosProdList)
{
    foreach ($OrdersItemTable as $itemOrdersItem) {
        if ($idOrder == $itemOrdersItem['IDORDER']) {
            foreach ($TableProdAll as $itemProd) {
                if ($itemProd['ID'] == $itemOrdersItem['IDPROD']) {
                    $imgSRC = '';
                    foreach ($PhotosProdList as $itemPhotos) {
                        if ($itemProd['ID'] == $itemPhotos['IDPROD']) {
                            $imgSRC = $itemPhotos['SRC'];
                            break;
                        }
                    }
                ?>
                    <tr>
                        <td class="img-orders-basket"><img src="<?= $imgSRC ?>" alt=""></td>
                        <td class="name-orders-basket">
                            <p><?= $itemProd['NAME'] ?></p>
                            <span class="color-order-basket"><?= $itemOrdersItem['COLOR'] ?></span>
                        </td>
                        <td class="value-orders-basket">
                            <?= $itemOrdersItem['QUANTITY'] ?> шт.
                        </td>
                        <td class="amount-orders-basket"><?= number_format($itemOrdersItem['AMOUNT'], 0, '.', ' ') . ' ' ?> руб</td>
                    </tr>
<?php
                }
            }
        }
    }
}
