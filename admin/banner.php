<?php
require_once('../config/banner.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../css/banner.css">

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
            <div id="baner-block">
                <h1 class="banner_block_name">Баннер</h1>
                <div class="add_banner_block">
                    <form action="" id="addBannerForm">
                        <input type="file" id="file_banner_img" name="imgSlider">
                        <input type="button" class="add_banner_img" onclick="addSlider()" value="Добавить фото">
                    </form>
                </div>
                <div id="img-banner-block" class="img-banner-block">
                    <?php
                    addSliderAdmUpd($SliderList);
                    ?>
                </div>
            </div>

        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>
</body>
<script src="../script/add-banner.js"></script>

</html>