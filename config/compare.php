<?php
require_once('connect.php');
session_start();

if (isset($_SESSION['comprasion'])) {
    $CompareTable = $_SESSION['comprasion'];
}
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
$PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);


function addListCompare($CompareTable, $TableProdAll, $PhotosProdList)
{
    foreach ($CompareTable as $itemCompare) {
        foreach ($TableProdAll as $itemProd) {
            if ($itemProd['ID'] == $itemCompare['ID']) {
                $imgSrc = '';
                foreach ($PhotosProdList as $itemPhotos) {
                    if ($itemPhotos['IDPROD'] == $itemProd['ID']) {
                        $imgSrc = $itemPhotos['SRC'];
                        break;
                    }
                }
?>
                <div class="item-block-compare">
                    <div class="top-block">
                        <div class="compare-photo-block">
                            <a href="product-card.php?idProd=<?= $itemProd['ID'] ?>">
                                <img src="<?= $imgSrc ?>" alt="" class="img-item-compare">
                            </a>
                            <!-- <button class="del-item-compare_button" type="button">
                                <img src="img/main/close-cross-in-circular-outlined-interface-button-svgrepo-com.png" alt="" class="del-item-compare">
                            </button> -->
                        </div>
                        <a href="product-card.php?idProd=<?= $itemProd['ID'] ?>">
                            <div class="name-item-compare">
                                <?= $itemProd['NAME'] ?>
                            </div>
                        </a>
                        <div class="min-desc-item-compare">
                            <?= $itemProd['SHORTDESC'] ?>
                        </div>
                        <p class="price-item-prod">
                            Цена:
                            <span class="price-value-item-prod">
                                <?= number_format($itemProd['PRICE'], 0, '.', ' ') . ' ' ?>
                                <span class="rub-item-prod">
                                    руб
                                </span>
                            </span>
                        </p>
                        <!-- <div class="buy-button-basket">
                            <input class="add_basket_button" type="button" value="Купить">
                        </div> -->
                        <?php
                        if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') {
                        ?>
                            <div class="add-button-izb">
                                <input class="add_izb_button" type="button" value="В избранные" onclick="addFavourit(<?= $itemProd['ID'] ?>)">
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="bottom-block">
                        <ul class="list-characteristic">
                            <li class="item-list-characteristic">
                                <?= $itemProd['PRODUCER'] ?>
                            </li>
                            <li class="item-list-characteristic">
                                <?= $itemProd['CONTRY'] ?>
                            </li>
                            <li class="item-list-characteristic">
                                <?= $itemProd['LIGHT'] ?>
                            </li>
                            <li class="item-list-characteristic">
                                <?= $itemProd['GLASS'] ?>
                            </li>
                            <li class="item-list-characteristic">
                                <?= $itemProd['HEIGHT'] ?>
                            </li>
                            <li class="item-list-characteristic">
                                <?= $itemProd['VOLUME'] ?>
                            </li>
                            <li class="item-list-characteristic">
                                <?= $itemProd['XSIZE'] ?>
                            </li>
                            <li class="item-list-characteristic">
                                <?= $itemProd['YSIZE'] ?>
                            </li>
                            <li class="item-list-characteristic">
                                <?= $itemProd['ZSIZE'] ?>
                            </li>
                        </ul>
                    </div>
                </div>
<?php

            }
        }
    }
}
