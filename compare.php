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