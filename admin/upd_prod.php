<?php
require_once('../config/category.php');
$idProd = $_GET['idProd'];
$itemProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE `ID`='$idProd'");
$itemProd = mysqli_fetch_assoc($itemProd);
$ColorProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products_color` WHERE `IDPROD`='$idProd'");
$ColorProd = mysqli_fetch_assoc($ColorProd);
$PhotosProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE `IDPROD`='$idProd'");
$PhotosProd = mysqli_fetch_all($PhotosProd, MYSQLI_ASSOC);
$NewProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new` WHERE `IDPROD`='$idProd'");
$NewProd = mysqli_fetch_assoc($NewProd);
$SaleProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products_sale` WHERE `IDPROD`='$idProd'");
$SaleProd = mysqli_fetch_assoc($SaleProd);
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
                <h1 class="add_prod_name">Изменение товара</h1>
                <form action="" id="updProdForm">
                    <input type="hidden" name="idProd" id="idProd" value="<?= $idProd ?>">
                    <div id="block-info-prod">
                        <div class="line-form">
                            <p class="name-input">Категория:</p>
                            <select name="catIdProd" id="catIdProd">
                                <option value=""></option>
                                <?php
                                oprtionCategory($CategoryTable, $itemProd['IDCAT']);
                                ?>
                            </select>
                        </div>
                        <div class="line-form">
                            <p class="name-input">Название:</p>
                            <input class="input-user-form" type="text" id="nameProd" name="nameProd" value="<?= $itemProd['NAME'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Короткое описание:</p>
                            <input class="input-user-form" type="text" id="shorDescProd" name="shorDescProd" value="<?= $itemProd['SHORTDESC'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Код:</p>
                            <input class="input-user-form" type="number" placeholder="" id="codeProd" name="codeProd" value="<?= $itemProd['CODE'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Цена:</p>
                            <input class="input-user-form" type="number" placeholder="руб." id="priceProd" name="priceProd" value="<?= $itemProd['PRICE'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Производитель:</p>
                            <input class="input-user-form" type="text" id="producerProd" name="producerProd" value="<?= $itemProd['PRODUCER'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Страна производителя:</p>
                            <input class="input-user-form" type="text" id="countryProd" name="countryProd" value="<?= $itemProd['CONTRY'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Мощность светильника:</p>
                            <input class="input-user-form" type="number" placeholder="Ватт" id="lightProd" name="lightProd" value="<?= $itemProd['LIGHT'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Толщина стекла:</p>
                            <input class="input-user-form" type="number" placeholder="мм." id="glassProd" name="glassProd" value="<?= $itemProd['GLASS'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Высота тумбы:</p>
                            <input class="input-user-form" type="number" placeholder="см." id="heightProd" name="heightProd" value="<?= $itemProd['HEIGHT'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Объём:</p>
                            <input class="input-user-form" type="number" placeholder="л." id="volumeProd" name="volumeProd" value="<?= $itemProd['VOLUME'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Длинна:</p>
                            <input class="input-user-form" type="number" placeholder="см." id="xSizeProd" name="xSizeProd" value="<?= $itemProd['XSIZE'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Ширина:</p>
                            <input class="input-user-form" type="number" placeholder="см." id="ySizeProd" name="ySizeProd" value="<?= $itemProd['YSIZE'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Высота:</p>
                            <input class="input-user-form" type="number" placeholder="см." id="zSizeProd" name="zSizeProd" value="<?= $itemProd['ZSIZE'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Спецпредложение:</p>
                            <select id="saleProd" name="saleProd">
                                <option value="0">Нет</option>
                                <option value="1" <?php if (isset($SaleProd)) echo 'selected="selected"' ?>>Да</option>
                            </select>
                        </div>
                        <div class="line-form">
                            <p class="name-input">Новинки:</p>
                            <select id="newProd" name="newProd">
                                <option value="0">Нет</option>
                                <option value="1" <?php if (isset($NewProd)) echo 'selected="selected"' ?>>Да</option>
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
                            <?php
                            foreach ($PhotosProd as $key => $value) {
                            ?>
                                <div class="photo_add" id="photo_<?= $key + 1 ?>" style="background-image: url(<?= '../' . $value['SRC'] ?>);">
                                    <button class="del-item-favourites_button" type="button" onclick="delPhoto('photo_<?= $key + 1 ?>')">
                                        <img src="../img/main/del_photos.png" alt="" class="del-item-favourites">
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div id="add-color">
                        <h1 class="add_img-title">Добавить цвет (максимум 5 цветов)</h1>
                        <div class="line-form">
                            <p class="name-input">Цвет 1:</p>
                            <input class="input-user-form" type="text" id="color1Prod" name="color1Prod" value="<?= $ColorProd['COLOR1'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Цвет 2:</p>
                            <input class="input-user-form" type="text" id="color2Prod" name="color2Prod" value="<?= $ColorProd['COLOR2'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Цвет 3:</p>
                            <input class="input-user-form" type="text" id="color3Prod" name="color3Prod" value="<?= $ColorProd['COLOR3'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Цвет 4:</p>
                            <input class="input-user-form" type="text" id="color4Prod" name="color4Prod" value="<?= $ColorProd['COLOR4'] ?>">
                        </div>
                        <div class="line-form">
                            <p class="name-input">Цвет 5:</p>
                            <input class="input-user-form" type="text" id="color5Prod" name="color5Prod" value="<?= $ColorProd['COLOR5'] ?>">
                        </div>

                    </div>
                    <div id="description_add">
                        <h1 class="add_img-title">Описание</h1>
                        <textarea name="description_prod" id="description_prod"><?= $itemProd['DESCRIPTION'] ?></textarea>
                    </div>

                    <div id="button-add-prod">
                        <input class="add_prod_button" type="button" value="Изменить" onclick="updProduct()">
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