<?php
require_once('config/compare.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сравнение</title>
    <link rel="stylesheet" href="css/compare.css">
</head>

<body>

    <div id="page">
        <?php
        require_once('category-block.php')
        ?>
        <div id="main-block">
            <?php
            require_once('header.php');
            ?>
            <div id="breadcrumbs_block">
                <a href="index.php" class="crumb">Главная</a>
                <span>/</span>
                <a href="" class="crumb active_crumb">Сравнение</a>
            </div>
            <div id="main-block-compare">
                <div class="title_compare">
                    Список сравнений
                </div>
                <div id="table-compare">
                    <div id="left-block-compare">
                        <div class="top-block">
                            <input class="del-compare" type="button" value="Очистить" onclick="delCompare()">
                        </div>
                        <div class="bottom-block">
                            <ul class="list-characteristic left-block-ul">
                                <li class="item-list-characteristic">
                                    Производитель
                                </li>
                                <li class="item-list-characteristic">
                                    Страна производителя
                                </li>
                                <li class="item-list-characteristic">
                                    Мощность светильника (Ватт)
                                </li>
                                <li class="item-list-characteristic">
                                    Толщина стекла (мм.)
                                </li>
                                <li class="item-list-characteristic">
                                    Высота тумбы (см.)
                                </li>
                                <li class="item-list-characteristic">
                                    Объём (л.)
                                </li>
                                <li class="item-list-characteristic">
                                    Длина (см.)
                                </li>
                                <li class="item-list-characteristic">
                                    Ширина (см.)
                                </li>
                                <li class="item-list-characteristic">
                                    Высота (см.)
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="block-scrol">
                        <div id="list-product-compare">
                            <?php
                            if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
                                addListCompare($CompareTable, $TableProdAll, $PhotosProdList);
                            }
                            ?>

                            <!-- <div class="item-block-compare">
                                <div class="top-block">
                                    <div class="compare-photo-block">
                                        <a href="">
                                            <img src="img/product/2.png" alt="" class="img-item-compare">
                                        </a>
                                        <button class="del-item-compare_button" type="button">
                                            <img src="img/main/close-cross-in-circular-outlined-interface-button-svgrepo-com.png" alt="" class="del-item-compare">
                                        </button>
                                    </div>
                                    <div class="name-item-compare">
                                        Аквариум Ferplast Dubai 100 (190)
                                    </div>
                                    <div class="min-desc-item-compare">
                                        Классический аквариум прямоугольной формы объёмом 190 литров.
                                    </div>
                                    <p class="price-item-prod">
                                        Цена:
                                        <span class="price-value-item-prod">
                                            60000
                                            <span class="rub-item-prod">
                                                руб
                                            </span>
                                        </span>
                                    </p>
                                    <div class="buy-button-basket">
                                        <input class="add_basket_button" type="button" value="Купить">
                                    </div>
                                    <div class="add-button-izb">
                                        <input class="add_izb_button" type="button" value="В избранные">
                                    </div>
                                </div>
                                <div class="bottom-block">
                                    <ul class="list-characteristic">
                                        <li class="item-list-characteristic">
                                            -
                                        </li>
                                        <li class="item-list-characteristic">
                                            Италия
                                        </li>
                                        <li class="item-list-characteristic">
                                            78
                                        </li>
                                        <li class="item-list-characteristic">
                                            6
                                        </li>
                                        <li class="item-list-characteristic">
                                            -
                                        </li>
                                        <li class="item-list-characteristic">
                                            190
                                        </li>
                                        <li class="item-list-characteristic">
                                            101
                                        </li>
                                        <li class="item-list-characteristic">
                                            41
                                        </li>
                                        <li class="item-list-characteristic">
                                            53
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
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

<script src="script/favourites.js"></script>
<script src="script/compare.js"></script>

</html>