<?php
require_once('config/connect.php');
$idProd = $_GET['idProd'];
$itemProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE `ID`='$idProd'");
$itemProd = mysqli_fetch_assoc($itemProd);
$ColorProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products_color` WHERE `IDPROD`='$idProd'");
$ColorProd = mysqli_fetch_assoc($ColorProd);
$PhotosProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE `IDPROD`='$idProd'");
$PhotosProd = mysqli_fetch_all($PhotosProd, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Карточка товара</title>
    <link rel="stylesheet" href="css/product-card.css">
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
            <div id="breadcrumbs_block">
                <a href="index.php" class="crumb">Главная</a>
                <span>/</span>
                <a href="catalog.php" class="crumb">Каталог</a>
                <span>/</span>
                <a href="" class="crumb active_crumb"><?= $itemProd['NAME'] ?></a>
            </div>
            <div id="info_product-main-block">
                <div id="photos_product_block">
                    <div id="left-slider-img">
                        <div id="button-up">
                            <img class="slider-vector-img" src="img/main/slider-product-photos-up.png" alt="">
                        </div>
                        <div id="button-down">
                            <img class="slider-vector-img" src="img/main/slider-product-photos.png" alt="">
                        </div>
                        <div id="img-list-block">
                            <input id="valuePageSlider" type="hidden" value="<?= count($PhotosProd) - 2 ?>">
                            <div id="img-list">
                                <?php
                                foreach ($PhotosProd as $key => $item) {
                                    if ($key == 0) {
                                ?>
                                        <div onclick="sliderMainPhoto(<?= $key ?>)" class="item-img-slider-prod active-item-img-slider-prod">
                                            <img class="item-img-prod" src="<?= $item['SRC'] ?>" alt="">
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div onclick="sliderMainPhoto(<?= $key ?>)" class="item-img-slider-prod">
                                            <img class="item-img-prod" src="<?= $item['SRC'] ?>" alt="">
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="main-product-img">
                        <img id="main-photo-img" src="<?= $PhotosProd[0]['SRC'] ?>" alt="">
                    </div>
                </div>

                <div id="info-right_product_block">
                    <div class="title-name-prod">
                        <?= $itemProd['NAME'] ?>
                    </div>
                    <div class="code-product">
                        Код:
                        <span><?= $itemProd['CODE'] ?></span>
                    </div>
                    <div class="min-desc-product">
                        <?= $itemProd['SHORTDESC'] ?>
                    </div>
                    <div class="title-color-block">Другие цвета:</div>
                    <div class="color-product-block">
                        <input id="idProd" type="hidden" value="<?= $idProd ?>">
                        <input id="ColorId" name="ColorId" type="hidden" value="<?= $ColorProd['COLOR1'] ?>">
                        <?php
                        $prov = true;
                        for ($i = 0; $i < 5; $i++) {
                            $name = 'COLOR' . $i + 1;
                            if ($ColorProd[$name] !== '') {
                                if ($prov) {
                                    $prov = false;
                        ?>
                                    <div onclick="swipeColor(<?= $i + 1  ?>)" id="color_<?= $i + 1 ?>" class="item-color-product active-color"><?= $ColorProd[$name] ?></div>
                                <?php
                                } else {
                                ?>
                                    <div onclick="swipeColor(<?= $i + 1  ?>)" id="color_<?= $i + 1 ?>" class="item-color-product"><?= $ColorProd[$name] ?></div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="price-product">
                        Цена:
                        <span class="price"><?= number_format($itemProd['PRICE'], 0, '.', ' ') . ' ' ?></span>
                        <span class="rub">руб</span>
                    </div>
                    <div class="button-product-block">
                        <div class="buy-button-basket">
                            <input class="add_basket_button" type="button" value="Купить" onclick="addBasket(<?= $idProd ?>)">
                        </div>
                        <?php
                        if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') {
                        ?>
                            <div class="add-button-izb">
                                <input class="add_izb_button" type="button" value="В избранные" onclick="addFavourit(<?= $idProd ?>)">
                            </div>
                        <?php
                        }
                        ?>
                        <div class="add-button-srv">
                            <input class="add_srv_button" type="button" value="Сравнить" onclick="addCompare(<?= $idProd ?>)">
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer-info-product-block">
                <div id="block-table-footer-info">
                    <div id="heading-info">
                        <div id="description-button" class="active-item-heading-info">
                            Описание
                        </div>
                        <div id="characteristic-button" class="">
                            Характеристики
                        </div>
                    </div>
                    <div id="body-info-footer">
                        <div id="description-body" class="body-info-item active-item-body-info">
                            <?= nl2br($itemProd['DESCRIPTION']) ?>
                        </div>
                        <div id="characteristic-body" class="body-info-item">
                            <table>
                                <tbody>
                                    <tr>
                                        <th><span class="text-el">Производитель</span></th>
                                        <td><span class="text-el"><?= $itemProd['PRODUCER'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <th><span class="text-el">Страна производителя</span></th>
                                        <td><span class="text-el"><?= $itemProd['CONTRY'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <th><span class="text-el">Мощность светильника (Ватт)</span></th>
                                        <td><span class="text-el"><?= $itemProd['LIGHT'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <th><span class="text-el">Толщина стекла (мм.)</span></th>
                                        <td><span class="text-el"><?= $itemProd['GLASS'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <th><span class="text-el">Высота тумбы: (см.)</span></th>
                                        <td><span class="text-el"><?= $itemProd['HEIGHT'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <th><span class="text-el">Объём (л.)</span></th>
                                        <td><span class="text-el"><?= $itemProd['VOLUME'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <th><span class="text-el">Длина (см.)</span></th>
                                        <td><span class="text-el"><?= $itemProd['XSIZE'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <th><span class="text-el">Ширина (см.)</span></th>
                                        <td><span class="text-el"><?= $itemProd['YSIZE'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <th><span class="text-el">Высота (см.)</span></th>
                                        <td><span class="text-el"><?= $itemProd['ZSIZE'] ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>

</body>

<script src="script/product-card.js"></script>
<script src="script/favourites.js"></script>
<script src="script/compare.js"></script>

</html>