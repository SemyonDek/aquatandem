<?php
require_once('../../config/connect.php');
$nameCat = $_POST['nameCat'];
mysqli_query($ConnectDatabase, "INSERT INTO `category` (`ID`, `NAME`) VALUES (NULL, '$nameCat')");

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