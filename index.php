<?php
require_once('config/banner.php');
require_once('config/product_aqua.php');
require_once('config/product_sale.php');
require_once('config/product_new.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>АкваТандем - интернет-магазин аквариумов в Москве</title>
    <link rel="stylesheet" href="css/index.css">
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
                    addSliderIndex($SliderList);
                    ?>
                    <!-- <img src="img/main/slider/1.png" alt="" class="img-slider-img">
                    <img src="img/main/slider/2.jpg" alt="" class="img-slider-img">
                    <img src="img/main/slider/3.jpg" alt="" class="img-slider-img">
                    <img src="img/main/slider/4.jpg" alt="" class="img-slider-img">
                    <img src="img/main/slider/5.jpg" alt="" class="img-slider-img"> -->
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
                                AddSaleSlider($ProdSaleTable, $TableProdAll, $PhotosProdList);
                                ?>

                                <!-- <div class="prod-slider-item">
                                    <a href="">
                                        <div class="prod-slider-item-img-block">
                                            <img src="img/product/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="prod-slider-item-text-block">
                                        <a href="">
                                            <h3 class="name-item-prod">
                                                Аквариум настенный 1000
                                            </h3>
                                        </a>
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
                                AddNewSlider($ProdNewTable, $TableProdAll, $PhotosProdList);
                                ?>

                                <!-- <div class="prod-slider-item">
                                    <a href="">
                                        <div class="prod-slider-item-img-block">
                                            <img src="img/product/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="prod-slider-item-text-block">
                                        <a href="">
                                            <h3 class="name-item-prod">
                                                Аквариум настенный 1000
                                            </h3>
                                        </a>
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
                    addAquaIndexUser($AquaTable);
                    ?>
                    <!-- <div class="accessories_item">

                        <img src="img/accessories/aqua_1.png" alt="" class="img_accessories_item">
                        <h2 class="title_accessories_item">Автокормушки</h2>

                        <p class="text_accessories_item">
                            удобное решение автоматизации процесса
                            кормления обитателей аквариума, особенно
                            актуально их применение в период вашего
                            длительного отсутствия;
                        </p>
                    </div> -->
                </div>

                <div id="info_site">
                    <h1 class="title_index">
                        Где купить аквариум?
                    </h1>
                    <p class="where_buy">
                        «Акватандем» – магазин аквариумов в Москве, предлагающий
                        разнообразную продукцию. К нам обращаются и опытные, и
                        начинающие аквариумисты. Поэтому в ассортименте всегда есть
                        недорогие аквариумы для новичков и многолитражные экземпляры для
                        профессионалов.
                    </p>
                    <p class="where_buy">
                        Преимущества магазина «Акватандем»:
                    </p>
                    <div id="advantages_site">
                        <div class="advantages_item">
                            <img src="img/main/Advantages/fact_1.png" alt="" class="advantages_item_img">
                            <h2 class="advantages_item_title">Кристальная история</h2>
                            <p class="advantages_item_text">На рынке розничной торговли с 2009 года, только довольные клиенты</p>
                        </div>
                        <div class="advantages_item">
                            <img src="img/main/Advantages/fact_2.png" alt="" class="advantages_item_img">
                            <h2 class="advantages_item_title">Богатый ассортимент</h2>
                            <p class="advantages_item_text">Сотни моделей аквариумов и сопутствующих аксессуаров</p>
                        </div>
                        <div class="advantages_item">
                            <img src="img/main/Advantages/fact_3.png" alt="" class="advantages_item_img">
                            <h2 class="advantages_item_title">Комплексный сервис</h2>
                            <p class="advantages_item_text">Эффективное решение задач, найденное при минимальных затратах вашего личного времени</p>
                        </div>
                        <div class="advantages_item">
                            <img src="img/main/Advantages/fact_5.png" alt="" class="advantages_item_img">
                            <h2 class="advantages_item_title">Лучшие аквариумнисты</h2>
                            <p class="advantages_item_text">В нашей команде работают только профессионалы</p>
                        </div>
                        <div class="advantages_item">
                            <img src="img/main/Advantages/fact_5.png" alt="" class="advantages_item_img">
                            <h2 class="advantages_item_title">Качественная продукция</h2>
                            <p class="advantages_item_text">У нас вы найдёте аквариумное оборудование от производителей с мировым именем</p>
                        </div>
                        <div class="advantages_item">
                            <img src="img/main/Advantages/fact_4.png" alt="" class="advantages_item_img">
                            <h2 class="advantages_item_title">доступная стоимость</h2>
                            <p class="advantages_item_text">Это возможно в масштабном бизнесе и прямых деловых отношениях с производителями</p>
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
<script src="script/slider-img.js"></script>
<script src="script/slider-prod.js"></script>

</html>