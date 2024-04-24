<?php
require_once('../config/product_aqua.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../css/product_aqua.css">
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
            <div id="aqua-main-block">
                <h1 class="aqua_block_name">Товары для аквариумов</h1>
                <a href="add_product_aqua.php" class="add_aqua">Добавить</a>
                <div id="accessories_prod">
                    <?php
                    addAquaAdmin($AquaTable);
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
                        <a href="upd_product_aqua.php" class="upd_aqua">Изменить</a>
                        <input class="del_aqua" type="button" value="Удалить">
                    </div> -->
                </div>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>
</body>

<script src="../script/product_aqua.js"></script>

</html>