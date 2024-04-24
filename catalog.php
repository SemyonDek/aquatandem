<?php
require_once('config/category.php');
if (isset($_GET['idCat']) && $_GET['idCat'] !== '') {
    $idCat = $_GET['idCat'];
    $nameCat = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE `ID`='$idCat'");
    $nameCat = mysqli_fetch_all($nameCat, MYSQLI_ASSOC);
    $nameCat = $nameCat[0]['NAME'];
} else {
    $idCat = '';
    $nameCat = 'Каталог';
}
require_once('config/product.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="css/catalog.css">
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
                <?php
                if ($idCat !== '') echo '<a href="catalog.php" class="crumb">Каталог</a><span>/</span>';
                ?>
                <a href="" class="crumb active_crumb"><?= $nameCat ?></a>
            </div>
            <div id="catalog_block">
                <h1 class="catalog_name"><?= $nameCat ?></h1>
                <div id="sort_block">
                    <div class="select_block">
                        <select name="sort_select" id="sort_select" class="selected_form" onchange="sortProd()">
                            <option value=""></option>
                            <option value="0" <?php if (isset($_GET['sort_select']) && $_GET['sort_select'] == 0) echo 'selected="selected"'; ?>>От дешевых к дорогим</option>
                            <option value="1" <?php if (isset($_GET['sort_select']) && $_GET['sort_select'] == 1) echo 'selected="selected"'; ?>>От дорогих к дешевым</option>
                        </select>
                        <label for="sort_select">
                            <div class="button_select">
                                <img src="img/main/down-2-svgrepo-com.png" alt="" class="select_img">
                            </div>
                        </label>
                    </div>
                </div>
                <div id="content_catalog_block">
                    <div id="list-product-block">
                        <?php
                        addListProd($ProductTable, $PhotosProdList);
                        ?>
                    </div>
                    <div id="filter-block">
                        <form action="" id="filter_form" method="get">
                            <input type="hidden" name="idCat" id="idCat_filter" value="<?= $idCat ?>">
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
                                                <img src="img/main/down-2-svgrepo-com.png" alt="" class="select_img">
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
                            <input type="hidden" name="idCat" id="idCat_sbros" value="<?= $idCat ?>">
                            <input type="hidden" name="sort_select" id="sort_select_sbros" value="<?php if (isset($_GET['sort_select'])) echo $_GET['sort_select']; ?>">
                            <div class="block-filter-input-number">
                                <input class="filter_button" type="submit" value="Сбросить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>

</body>
<script src="script/sort.js"></script>

</html>