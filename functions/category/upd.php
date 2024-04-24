<?php
require_once('../../config/connect.php');
$idCat = $_POST['idCat'];
$nameCat = $_POST['nameCat'];
mysqli_query($ConnectDatabase, "UPDATE `category` SET `NAME` = '$nameCat' WHERE `category`.`ID` = $idCat");

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