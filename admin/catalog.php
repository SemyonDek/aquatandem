<?php
require_once('../config/product.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/catalog-admin.css">
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
            <div id="catalog_block">
                <h1 class="catalog_name">Каталог</h1>
                <a class="add_prod" href="add_prod.php">Добавить товар</a>
                <div id="sort_block">
                    <div class="select_block">
                        <select name="sort_select" id="sort_select" class="selected_form" onchange="sortProd()">
                            <option value=""></option>
                            <option value="0" <?php if (isset($_GET['sort_select']) && $_GET['sort_select'] == 0) echo 'selected="selected"'; ?>>От дешевых к дорогим</option>
                            <option value="1" <?php if (isset($_GET['sort_select']) && $_GET['sort_select'] == 1) echo 'selected="selected"'; ?>>От дорогих к дешевым</option>
                        </select>
                        <label for="sort_select">
                            <div class="button_select">
                                <img src="../img/main/down-2-svgrepo-com.png" alt="" class="select_img">
                            </div>
                        </label>
                    </div>
                </div>
                <div id="content_catalog_block">
                    <div id="list-product-block">
                        <?php
                        addListProdAdmin($ProductTable, $PhotosProdList);
                        ?>

                        <!-- <div class="item-product">

                            <div class="img-item-product-block">
                                <img src="../img/product/1.png" alt="" class="img-item-product">
                            </div>

                            <div class="text-item-product-block">

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
                                <div class="button-prod-block">
                                    <a href="upd_prod.php">
                                        <input class="button-prod" type="button" value="Изменить">
                                    </a>
                                    <input class="button-prod" type="button" value="Удалить">
                                </div>

                            </div>
                        </div> -->
                    </div>
                    <div id="filter-block">
                        <form action="" id="filter_form" method="get">
                            <input type="hidden" name="sort_select" id="sort_select_filter" value="<?php if (isset($_GET['sort_select'])) echo $_GET['sort_select']; ?>">
                            <div class="block-filter-input-number">
                                <h5 class="title-filter">ЦЕНА</h5>
                                <div class="block-input-filter">
                                    <input type="number" class="input-filter" placeholder="0" name="min_price" id="min_price" value="<?php if (isset($_GET['min_price'])) echo $_GET['min_price']; ?>">
                                    <input type="number" class="input-filter" placeholder="1000000" name="max_price" id="max_price" value="<?php if (isset($_GET['max_price'])) echo $_GET['max_price']; ?>">
                                </div>
                            </div>
                            <div class="block-filter-input-number">
                                <h5 class="title-filter">объем (л.)</h5>
                                <div class="block-input-filter">
                                    <input type="number" class="input-filter" placeholder="0" name="min_value" id="min_value" value="<?php if (isset($_GET['min_value'])) echo $_GET['min_value']; ?>">
                                    <input type="number" class="input-filter" placeholder="1000000" name="max_value" id="max_value" value="<?php if (isset($_GET['max_value'])) echo $_GET['max_value']; ?>">
                                </div>
                            </div>
                            <div class="block-filter-input-number">
                                <h5 class="title-filter">длинна (см.)</h5>
                                <div class="block-input-filter">
                                    <input type="number" class="input-filter" placeholder="0" name="min_xsize" id="min_xsize" value="<?php if (isset($_GET['min_xsize'])) echo $_GET['min_xsize']; ?>">
                                    <input type="number" class="input-filter" placeholder="1000000" name="max_xsize" id="max_xsize" value="<?php if (isset($_GET['max_xsize'])) echo $_GET['max_xsize']; ?>">
                                </div>
                            </div>
                            <div class="block-filter-input-number">
                                <h5 class="title-filter">ширина (л.)</h5>
                                <div class="block-input-filter">
                                    <input type="number" class="input-filter" placeholder="0" name="min_ysize" id="min_ysize" value="<?php if (isset($_GET['min_ysize'])) echo $_GET['min_ysize']; ?>">
                                    <input type="number" class="input-filter" placeholder="1000000" name="max_ysize" id="max_ysize" value="<?php if (isset($_GET['max_ysize'])) echo $_GET['max_ysize']; ?>">
                                </div>
                            </div>
                            <div class="block-filter-input-number">
                                <h5 class="title-filter">высота (л.)</h5>
                                <div class="block-input-filter">
                                    <input type="number" class="input-filter" placeholder="0" name="min_zsize" id="min_zsize" value="<?php if (isset($_GET['min_zsize'])) echo $_GET['min_zsize']; ?>">
                                    <input type="number" class="input-filter" placeholder="1000000" name="max_zsize" id="max_zsize" value="<?php if (isset($_GET['max_zsize'])) echo $_GET['max_zsize']; ?>">
                                </div>
                            </div>
                            <div class="block-filter-input-number">
                                <h5 class="title-filter">Производитель</h5>
                                <div class="block-input-filter">
                                    <div class="select_block">
                                        <select name="producer_select" id="producer_select" class="selected_form">
                                            <option value=""></option>
                                            <?php
                                            if (isset($_GET['producer_select'])) {
                                                addListProducer($country, $_GET['producer_select']);
                                            } else {
                                                addListProducer($country);
                                            }
                                            ?>
                                        </select>
                                        <label for="producer_select">
                                            <div class="button_select">
                                                <img src="../img/main/down-2-svgrepo-com.png" alt="" class="select_img">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="block-filter-input-number">
                                <input class="filter_button" type="submit" value="Применить">
                            </div>
                        </form>
                        <form action="" method="get">
                            <input type="hidden" name="sort_select" id="sort_select_sbros" value="<?php if (isset($_GET['sort_select'])) echo $_GET['sort_select']; ?>">
                            <div class="block-filter-input-number">
                                <input class="filter_button" type="submit" value="Сбросить">
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>

</body>
<script src="../script/product.js"></script>
<script src="../script/sort.js"></script>

</html>