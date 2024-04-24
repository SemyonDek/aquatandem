<?php
require_once('connect.php');
require_once('producer.php');
require_once('filters.php');

$ProductTable = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE 
PRICE BETWEEN $min_prod_mass AND $max_prod_mass AND 
VOLUME BETWEEN $min_prod_mass_value AND $max_prod_mass_value AND 
XSIZE BETWEEN $min_prod_mass_xsize AND $max_prod_mass_xsize AND 
YSIZE BETWEEN $min_prod_mass_ysize AND $max_prod_mass_ysize AND 
ZSIZE BETWEEN $min_prod_mass_zsize AND $max_prod_mass_zsize 
$searchStr $idCatProd $idProducer $sort");

$ProductTable = mysqli_fetch_all($ProductTable, MYSQLI_ASSOC);
$PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);

function addListProdAdmin($ProductTable, $PhotosProdList)
{
    foreach ($ProductTable as $item) {
        $imgsrc = '';
        foreach ($PhotosProdList as $itemImg) {
            if ($item['ID'] == $itemImg['IDPROD']) {
                $imgsrc = $itemImg['SRC'];
                break;
            }
        }
?>
        <div class="item-product">

            <div class="img-item-product-block">
                <img src="../<?= $imgsrc ?>" alt="" class="img-item-product">
            </div>

            <div class="text-item-product-block">

                <h3 class="name-item-prod">
                    <?= $item['NAME'] ?>
                </h3>

                <p class="desc-item-prod">
                    <?= $item['SHORTDESC'] ?>
                </p>
                <p class="price-item-prod">
                    Цена:
                    <span class="price-value-item-prod">
                        <?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?>
                        <span class="rub-item-prod">
                            руб
                        </span>
                    </span>
                </p>
                <div class="button-prod-block">
                    <a href="upd_prod.php?idProd=<?= $item['ID'] ?>">
                        <input class="button-prod" type="button" value="Изменить">
                    </a>
                    <input class="button-prod" type="button" value="Удалить" onclick="delProduct(<?= $item['ID'] ?>)">
                </div>

            </div>
        </div>
    <?php
    }
}

function addListProd($ProductTable, $PhotosProdList)
{
    foreach ($ProductTable as $item) {
        $imgsrc = '';
        foreach ($PhotosProdList as $itemImg) {
            if ($item['ID'] == $itemImg['IDPROD']) {
                $imgsrc = $itemImg['SRC'];
                break;
            }
        }
    ?>
        <div class="item-product">
            <a href="product-card.php?idProd=<?= $item['ID'] ?>">
                <div class="img-item-product-block">
                    <img src="<?= $imgsrc ?>" alt="" class="img-item-product">
                </div>
            </a>
            <div class="text-item-product-block">
                <a href="product-card.php?idProd=<?= $item['ID'] ?>">
                    <h3 class="name-item-prod">
                        <?= $item['NAME'] ?>
                    </h3>
                </a>
                <p class="desc-item-prod">
                    <?= $item['SHORTDESC'] ?>
                </p>
                <p class="price-item-prod">
                    Цена:
                    <span class="price-value-item-prod">
                        <?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?>
                        <span class="rub-item-prod">
                            руб
                        </span>
                    </span>
                </p>
            </div>
        </div>

    <?php
    }
}


function addListProducer($country, $idCountry = '')
{
    foreach ($country as $item) {
    ?>
        <option value="<?= $item ?>" <?php if ($idCountry == $item) echo 'selected="selected"' ?>><?= $item ?></option>
<?php
    }
}
