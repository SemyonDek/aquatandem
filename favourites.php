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