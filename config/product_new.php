<?php
require_once('connect.php');

$ProdNewTable = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new`");
$ProdNewTable = mysqli_fetch_all($ProdNewTable, MYSQLI_ASSOC);
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
$PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);


function AddNewSliderAdm($ProdNewTable, $TableProdAll, $PhotosProdList)
{
    foreach ($ProdNewTable as $itemSale) {
        foreach ($TableProdAll as $itemProd) {
            if ($itemSale['IDPROD'] == $itemProd['ID']) {
                $imgSrc = '';
                foreach ($PhotosProdList as $itemPhotos) {
                    if ($itemPhotos['IDPROD'] == $itemProd['ID']) {
                        $imgSrc = $itemPhotos['SRC'];
                        break;
                    }
                }
?>
                <div class="prod-slider-item">

                    <div class="prod-slider-item-img-block">
                        <img src="../<?= $imgSrc ?>" alt="">
                    </div>

                    <div class="prod-slider-item-text-block">

                        <h3 class="name-item-prod">
                            <?= $itemProd['NAME'] ?>
                        </h3>
                        <p class="desc-item-prod">
                            <?= $itemProd['SHORTDESC'] ?>
                        </p>
                        <p class="price-item-prod">
                            Цена:
                            <span class="price-value-item-prod">
                                <?= number_format($itemProd['PRICE'], 0, '.', ' ') . ' ' ?>
                                <span class="rub-item-prod">
                                    руб
                                </span>
                            </span>
                        </p>
                    </div>
                </div>

            <?php
                break;
            }
        }
    }
}

function AddNewSlider($ProdNewTable, $TableProdAll, $PhotosProdList)
{
    foreach ($ProdNewTable as $itemSale) {
        foreach ($TableProdAll as $itemProd) {
            if ($itemSale['IDPROD'] == $itemProd['ID']) {
                $imgSrc = '';
                foreach ($PhotosProdList as $itemPhotos) {
                    if ($itemPhotos['IDPROD'] == $itemProd['ID']) {
                        $imgSrc = $itemPhotos['SRC'];
                        break;
                    }
                }
            ?>
                <div class="prod-slider-item">

                    <div class="prod-slider-item-img-block">
                        <img src="<?= $imgSrc ?>" alt="">
                    </div>

                    <div class="prod-slider-item-text-block">

                        <h3 class="name-item-prod">
                            <?= $itemProd['NAME'] ?>
                        </h3>
                        <p class="desc-item-prod">
                            <?= $itemProd['SHORTDESC'] ?>
                        </p>
                        <p class="price-item-prod">
                            Цена:
                            <span class="price-value-item-prod">
                                <?= number_format($itemProd['PRICE'], 0, '.', ' ') . ' ' ?>
                                <span class="rub-item-prod">
                                    руб
                                </span>
                            </span>
                        </p>
                    </div>
                </div>

<?php
                break;
            }
        }
    }
}
