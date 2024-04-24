<?php
require_once('config/favourites.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Избранные</title>
    <link rel="stylesheet" href="css/catalog.css">
    <link rel="stylesheet" href="css/favourites.css">
</head>

<body>

    <div id="page">
        <?php
        require_once('category-block.php')
        ?>
        <div id="main-block">
            <?php
            $account = 1;
            require_once('header.php');
            ?>
            <div id="breadcrumbs_block">
                <a href="index.php" class="crumb">Главная</a>
                <span>/</span>
                <a href="" class="crumb active_crumb">Избранные</a>
            </div>
            <div id="catalog_block">
                <h1 class="catalog_name">Избранные</h1>
                <div id="content_catalog_block">
                    <div id="list-product-block">

                        <?php
                        listFavourit($FavouritTable, $TableProdAll, $PhotosProdList);
                        ?>
                        <!-- <div class="item-product">
                            <a href="product-card.php">
                                <div class="img-item-product-block">
                                    <img src="img/product/1.png" alt="" class="img-item-product">
                                </div>
                            </a>
                            <div class="text-item-product-block">
                                <a href="product-card.php">
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
                            <button class="del-item-favourites_button" type="button">
                                <img src="img/main/close-cross-in-circular-outlined-interface-button-svgrepo-com.png" alt="" class="del-item-favourites">
                            </button>
                        </div> -->
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

</html>