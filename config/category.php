<?php
require_once('connect.php');

$CategoryTable = mysqli_query($ConnectDatabase, "SELECT * FROM `category`");
$CategoryTable = mysqli_fetch_all($CategoryTable, MYSQLI_ASSOC);

function addListCatAdmin($CategoryTable)
{
    foreach ($CategoryTable as $key => $item) {
?>
        <tr>
            <td class="number"><?= $key + 1 ?></td>
            <td class="name" id="name_cat_<?= $item['ID'] ?>"><?= $item['NAME'] ?></td>
            <td class="upd" onclick="updCatButton(<?= $item['ID'] ?>)"><a href="#category-info">Изменить</a></td>
            <td class="del" onclick="delCatButton(<?= $item['ID'] ?>)">Удалить</td>
        </tr>

    <?php
    }
}

function catListCatalog($CategoryTable, $idCat)
{
    foreach ($CategoryTable as $item) {
    ?>
        <div class="line-category <?php if ($item['ID'] == $idCat) echo ' active-line-category'; ?>">
            <a href="catalog.php?idCat=<?= $item['ID'] ?>" class="category-link"><?= $item['NAME'] ?></a>
        </div>
    <?
    }
}

function oprtionCategory($CategoryTable, $idCat = '')
{
    foreach ($CategoryTable as $item) {
    ?>
        <option value="<?= $item['ID'] ?>" <?php if ($idCat == $item['ID']) echo 'selected="selected"' ?>><?= $item['NAME'] ?></option>
<?php
    }
}
?>