<?php
require_once('../../config/connect.php');
$idCat = $_POST['idcat'];
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);

$prov = true;
foreach ($TableProdAll as $item) {
    if ($item['IDCAT'] == $idCat) {
        $prov = false;
    }
}
if ($prov) {
    mysqli_query($ConnectDatabase, "DELETE FROM category WHERE `category`.`ID` = $idCat");
}

require_once('../../config/category.php');
?>

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