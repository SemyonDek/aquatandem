<?php

require_once('connect.php');
$AquaTable = mysqli_query($ConnectDatabase, "SELECT * FROM `product_aqua`");
$AquaTable = mysqli_fetch_all($AquaTable, MYSQLI_ASSOC);

function addAquaIndexAdmin($AquaTable)
{
    foreach ($AquaTable as $item) {
?>
        <div class="accessories_item">
            <img src="../<?= $item['SRC'] ?>" alt="" class="img_accessories_item">
            <h2 class="title_accessories_item"><?= $item['TITLE'] ?></h2>
            <p class="text_accessories_item">
                <?= $item['DESCR'] ?>
            </p>
        </div>
    <?php
    }
}
function addAquaIndexUser($AquaTable)
{
    foreach ($AquaTable as $item) {
    ?>
        <div class="accessories_item">
            <img src="<?= $item['SRC'] ?>" alt="" class="img_accessories_item">
            <h2 class="title_accessories_item"><?= $item['TITLE'] ?></h2>
            <p class="text_accessories_item">
                <?= $item['DESCR'] ?>
            </p>
        </div>
    <?php
    }
}

function addAquaAdmin($AquaTable)
{
    foreach ($AquaTable as $item) {
    ?>
        <div class="accessories_item">
            <img src="../<?= $item['SRC'] ?>" alt="" class="img_accessories_item">
            <h2 class="title_accessories_item"><?= $item['TITLE'] ?></h2>
            <p class="text_accessories_item">
                <?= $item['DESCR'] ?>
            </p>
            <a href="upd_product_aqua.php?idAqua=<?= $item['ID'] ?>" class="upd_aqua">Изменить</a>
            <input class="del_aqua" type="button" value="Удалить" onclick="delAqua(<?= $item['ID'] ?>)">
        </div>
<?php
    }
}
