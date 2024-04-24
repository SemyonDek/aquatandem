<?php
require_once('../config/category.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../css/category.css">

</head>

<body>
    <div id="category-info">
        <a href="#close">
        </a>
        <div id="modal-block-category">
            <h1 class="title-modal-block-category">
                Изменение категории
            </h1>
            <div class="upd-category-block">
                <form action="" id="updCategoryForm">
                    <input type="hidden" id="upd_numberCat" value="">
                    <input type="text" class="upd-category-input" placeholder="Название" id="upd_nameCat" value="">
                    <input type="button" class="upd_category_img" onclick="updCategory()" value="Изменить категорию">
                </form>
            </div>

            <a href="#close">
                <img src="../img/main/close-svgrepo-com.png" alt="" class="close-basket">
            </a>
        </div>
    </div>

    <div id="page">
        <?php
        require_once('category-block.php');
        ?>
        <div id="main-block">
            <?php
            require_once('header.php');
            ?>
            <div id="category-main-block">
                <h1 class="category_block_name">Категории</h1>
                <div class="add-category-block">
                    <form action="" id="addCategoryForm">
                        <input type="text" class="add-category-input" placeholder="Название" id="nameNewCat">
                        <input type="button" class="add_category_img" onclick="addCatButton()" value="Добавить категорию">
                    </form>
                </div>
                <div id="block-table-category">
                    <table>
                        <thead>
                            <tr>
                                <td class="number">№</td>
                                <td class="name">Название</td>
                                <td class="upd"></td>
                                <td class="del"></td>
                            </tr>
                        </thead>
                        <tbody id="tBody">
                            <?php
                            addListCatAdmin($CategoryTable);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>

</body>

<script src="../script/category.js"></script>

</html>