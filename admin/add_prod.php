<?php
require_once('../config/category.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../css/add-prod.css">
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
            <div id="add_prod_block">
                <h1 class="add_prod_name">Добавление товара</h1>
                <form action="" id="addProdForm">

                    <div id="block-info-prod">
                        <div class="line-form">
                            <p class="name-input">Категория:</p>
                            <select name="catIdProd" id="catIdProd">
                                <option value=""></option>
                                <?php
                                oprtionCategory($CategoryTable);
                                ?>
                            </select>
                        </div>
                        <div class="line-form">
                            <p class="name-input">Название:</p>
                            <input class="input-user-form" type="text" id="nameProd" name="nameProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Короткое описание:</p>
                            <input class="input-user-form" type="text" id="shorDescProd" name="shorDescProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Код:</p>
                            <input class="input-user-form" type="number" placeholder="" id="codeProd" name="codeProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Цена:</p>
                            <input class="input-user-form" type="number" placeholder="руб." id="priceProd" name="priceProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Производитель:</p>
                            <input class="input-user-form" type="text" id="producerProd" name="producerProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Страна производителя:</p>
                            <input class="input-user-form" type="text" id="countryProd" name="countryProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Мощность светильника:</p>
                            <input class="input-user-form" type="number" placeholder="Ватт" id="lightProd" name="lightProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Толщина стекла:</p>
                            <input class="input-user-form" type="number" placeholder="мм." id="glassProd" name="glassProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Высота тумбы:</p>
                            <input class="input-user-form" type="number" placeholder="см." id="heightProd" name="heightProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Объём:</p>
                            <input class="input-user-form" type="number" placeholder="л." id="volumeProd" name="volumeProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Длинна:</p>
                            <input class="input-user-form" type="number" placeholder="см." id="xSizeProd" name="xSizeProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Ширина:</p>
                            <input class="input-user-form" type="number" placeholder="см." id="ySizeProd" name="ySizeProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Высота:</p>
                            <input class="input-user-form" type="number" placeholder="см." id="zSizeProd" name="zSizeProd">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Спецпредложение:</p>
                            <select id="saleProd" name="saleProd">
                                <option value="0">Нет</option>
                                <option value="1">Да</option>
                            </select>
                        </div>
                        <div class="line-form">
                            <p class="name-input">Новинки:</p>
                            <select id="newProd" name="newProd">
                                <option value="0">Нет</option>
                                <option value="1">Да</option>
                            </select>
                        </div>
                    </div>
                    <div id="block-add-img">
                        <h1 class="add_img-title">Загрузить картинку</h1>
                        <div class="file_photo">
                            <input type="file" id="file_photo">
                            <input type="button" class="add_photo" onclick="addPhotos()" value="Добавить фото">
                            <input type="file" class="hidden" name="file_photo_1" id="file_photo_1">
                            <input type="file" class="hidden" name="file_photo_2" id="file_photo_2">
                            <input type="file" class="hidden" name="file_photo_3" id="file_photo_3">
                            <input type="file" class="hidden" name="file_photo_4" id="file_photo_4">
                            <input type="file" class="hidden" name="file_photo_5" id="file_photo_5">
                        </div>

                        <div id="phot_prod_add">

                        </div>
                    </div>
                    <div id="add-color">
                        <h1 class="add_img-title">Добавить цвет (максимум 5 цветов)</h1>
                        <div class="line-form">
                            <p class="name-input">Цвет 1:</p>
                            <input class="input-user-form" type="text" id="color1Prod" name="color1Prod">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Цвет 2:</p>
                            <input class="input-user-form" type="text" id="color2Prod" name="color2Prod">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Цвет 3:</p>
                            <input class="input-user-form" type="text" id="color3Prod" name="color3Prod">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Цвет 4:</p>
                            <input class="input-user-form" type="text" id="color4Prod" name="color4Prod">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Цвет 5:</p>
                            <input class="input-user-form" type="text" id="color5Prod" name="color5Prod">
                        </div>

                    </div>
                    <div id="description_add">
                        <h1 class="add_img-title">Описание</h1>
                        <textarea name="description_prod" id="description_prod"></textarea>
                    </div>

                    <div id="button-add-prod">
                        <input class="add_prod_button" type="button" value="Добавить" onclick="addProduct()">
                    </div>
                    <div id="button-back">
                        <a href="catalog.php">
                            <input class="add_prod_button" type="button" value="Вернуться назад">
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>

</body>
<script src="../script/add-photos.js"></script>
<script src="../script/product.js"></script>

</html>