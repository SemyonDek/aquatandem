<?php
require_once('connect.php');

if (isset($_SESSION['basket'])) {
    $BasketTable = $_SESSION['basket'];
}
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
$PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);


function addTableBassket($BasketTable, $TableProdAll, $PhotosProdList)
{
    foreach ($BasketTable as $key => $itemBasket) {
        foreach ($TableProdAll as $itemProd) {
            if ($itemProd['ID'] == $itemBasket['ID']) {
                $imgSrc = '';
                foreach ($PhotosProdList as $itemPhotos) {
                    if ($itemPhotos['IDPROD'] == $itemProd['ID']) {
                        $imgSrc = $itemPhotos['SRC'];
                        break;
                    }
                }
?>
                <tr>
                    <td class="del-prod-basket"><button type="button" onclick="delBasket(<?= $key ?>)">x</button></td>
                    <td class="img-basket"><img src="<?= $imgSrc ?>" alt=""></td>
                    <td class="name-prod-basket">
                        <a href="product-card.php?idProd=<?= $itemProd['ID'] ?>"><?= $itemProd['NAME'] ?></a>
                        <span class="color-prod-bassket"><?= $itemBasket['COLOR'] ?></span>
                    </td>
                    <td class="value-prod-basket">
                        <input onchange="updBasket(<?= $key ?>)" id="value_<?= $key ?>" type="number" value="<?= $itemBasket['VALUE'] ?>" min="1" max="20" onkeypress="return false">
                    </td>
                    <td id="amount_<?= $key ?>" class="amount-price-basket"><?= number_format($itemBasket['AMOUNT'], 0, '.', ' ') . ' ' ?> <span class="rub">руб</span></td>
                </tr>
            <?php
            }
        }
    }
}

function addTableBassketOrder($BasketTable, $TableProdAll, $PhotosProdList)
{
    foreach ($BasketTable as $key => $itemBasket) {
        foreach ($TableProdAll as $itemProd) {
            if ($itemProd['ID'] == $itemBasket['ID']) {
                $imgSrc = '';
                foreach ($PhotosProdList as $itemPhotos) {
                    if ($itemPhotos['IDPROD'] == $itemProd['ID']) {
                        $imgSrc = $itemPhotos['SRC'];
                        break;
                    }
                }
            ?>
                <tr>
                    <td class="img-orders-basket"><img src="<?= $imgSrc ?>" alt=""></td>
                    <td class="name-orders-basket">
                        <a href="product-card.php?idProd=<?= $itemProd['ID'] ?>"><?= $itemProd['NAME'] ?></a>
                        <span class="color-order-basket"><?= $itemBasket['COLOR'] ?></span>
                    </td>
                    <td class="value-orders-basket">
                        <?= $itemBasket['VALUE'] ?> шт.
                    </td>
                    <td class="amount-orders-basket"><?= number_format($itemBasket['AMOUNT'], 0, '.', ' ') . ' ' ?> руб </td>
                </tr>
<?php
            }
        }
    }
}
