<?php
require_once('../config/banner.php');
require_once('../config/product_aqua.php');
require_once('../config/product_sale.php');
require_once('../config/product_new.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../css/index.css">
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
            <div id="index-body-block">
                <div id="slider-img">
                    <?php
                    addSliderAdmIndex($SliderList);
                    ?>
                    <div id="button-img-slider-block">
                        <div id="left_button-img"></div>
                        <div id="right_button-img"></div>
                    </div>
                </div>
                <div id="slider-prod">
                    <div id="name-slider-prod">
                        <div id="sale-name-slider-prod" class="active-name-slider">Спецпреложения</div>
                        <div id="new-name-slider-prod">Новинки</div>
                    </div>

                    <div id="sale-block-prod" class="block-prod-slider active-block-slider">
                        <input id="value_sale-block-prod" type="hidden" value="1">
                        <div class="hidden-block">
                            <div id="sale-block-products-slider" class="products-slider-block">
                                <?php
                                AddSaleSliderAdm($ProdSaleTable, $TableProdAll, $PhotosProdList);
                                ?>

                                <!-- <div class="prod-slider-item">
                                    <div class="prod-slider-item-img-block">
                                        <img src="../img/product/1.png" alt="">
                                    </div>
                                    <div class="prod-slider-item-text-block">
                                        <h3 class="name-item-prod">
                                            Аквариум настенный 1000
                                        </h3>
                                        <p class="desc-item-prod">
                                            Уникальный настенный аквариум-картина.
                                        </p>
                                        <p class="price-item-prod">
                                            Цена:
                                            <span class="price-value-item-prod">
                                                60000
                                                <span class="rub-item-prod">
                                                    руб
                                                </span>
                                            </span>
                                        </p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="button-slider-prod">
                            <div id="button-sale-slider-left" class="button-slider-prod-left"></div>
                            <div id="button-sale-slider-right" class="button-slider-prod-right"></div>
                        </div>
                    </div>

                    <div id="new-block-prod" class="block-prod-slider">
                        <input id="value_new-block-prod" type="hidden" value="1">
                        <div class="hidden-block">
                            <div id="new-block-products-slider" class="products-slider-block">
                                <?php
                                AddNewSliderAdm($ProdNewTable, $TableProdAll, $PhotosProdList)
                                ?>

                                <!-- <div class="prod-slider-item">
                                    <div class="prod-slider-item-img-block">
                                        <img src="../img/product/1.png" alt="">
                                    </div>

                                    <div class="prod-slider-item-text-block">

                                        <h3 class="name-item-prod">
                                            Аквариум настенный 1000
                                        </h3>

                                        <p class="desc-item-prod">
                                            Уникальный настенный аквариум-картина.
                                        </p>
                                        <p class="price-item-prod">
                                            Цена:
                                            <span class="price-value-item-prod">
                                                60000
                                                <span class="rub-item-prod">
                                                    руб
                                                </span>
                                            </span>
                                        </p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="button-slider-prod">
                            <div id="button-new-slider-left" class="button-slider-prod-left"></div>
                            <div id="button-new-slider-right" class="button-slider-prod-right"></div>
                        </div>
                    </div>
                </div>

                <div id="accessories_prod">
                    <h1 class="title_index">
                        Товары для аквариумов
                    </h1>

                    <?php
                    addAquaIndexAdmin($AquaTable);
                    ?>
                    <!-- <div class="accessories_item">
                        <img src="../img/accessories/aqua_1.png" alt="" class="img_accessories_item">
                        <h2 class="title_accessories_item">Автокормушки</h2>
                        <p class="text_accessories_item">
                            удобное решение автоматизации процесса
                            кормления обитателей аквариума, особенно
                            актуально их применение в период вашего
                            длительного отсутствия;
                        </p>
                    </div> -->
                </div>

                <br>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>
</body>
<script src="../script/slider-img.js"></script>
<script src="../script/slider-prod.js"></script>

</html>