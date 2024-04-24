<?php
require_once('../config/connect.php');
$idAqua = $_GET['idAqua'];
$itemAqua = mysqli_query($ConnectDatabase, "SELECT * FROM `product_aqua` WHERE `ID`='$idAqua'");
$itemAqua = mysqli_fetch_assoc($itemAqua);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../css/add_product_aqua.css">
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
                <h1 class="aqua_block_name">Изменение товара для аквариумов</h1>
                <form action="" id="addAquaProdForm">
                    <input type="hidden" id="idAqua" name="idAqua" value="<?= $itemAqua['ID'] ?>">
                    <div class="block-add-img">
                        <h1 class="add_img-title">Загрузить картинку</h1>
                        <input type="file" id="file_photo" name="file_photo">
                    </div>
                    <div class="block-input">
                        <h1 class="add_img-title">Название</h1>
                        <input type="text" class="input_aqua" id="nameAqua" name="nameAqua" value="<?= $itemAqua['TITLE'] ?>">
                        <h1 class="add_img-title">Описание</h1>
                        <textarea class="textarea_aqua" name="descAqua" id="descAqua"><?= $itemAqua['DESCR'] ?></textarea>
                    </div>
                    <input class="button_aqua" type="button" value="Изменить" onclick="updAqua()">
                </form>
                <a href="product_aqua.php" class="back_aqua">Назад</a>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>
</body>
<script src="../script/product_aqua.js"></script>

</html>