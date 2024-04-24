<?php
require_once('../../config/connect.php');

$idAqua = $_POST['idAqua'];
$nameAqua = $_POST['nameAqua'];
$descAqua = $_POST['descAqua'];
if ($_FILES['file_photo']['name'] !== '') {
    $imgAqua = $_FILES['file_photo'];
    $srcImgAqua = '';
    $typeFIle = substr($imgAqua['name'], strrpos($imgAqua['name'], '.') + 1);
    $prov = True;
    while ($prov) {
        $fileName = uniqid() . '.' . $typeFIle;
        $fileUrl = '../../img/accessories/' . $fileName;
        $srcImgAqua = 'img/accessories/' . $fileName;

        if (!file_exists($fileUrl)) {
            move_uploaded_file($imgAqua['tmp_name'], $fileUrl);

            $prov = False;
        }
    }
    mysqli_query($ConnectDatabase, "UPDATE `product_aqua` SET `SRC` = '$srcImgAqua', `TITLE` = '$nameAqua', `DESCR` = '$descAqua'  WHERE `product_aqua`.`ID` = $idAqua");
} else {
    mysqli_query($ConnectDatabase, "UPDATE `product_aqua` SET `TITLE` = '$nameAqua', `DESCR` = '$descAqua'  WHERE `product_aqua`.`ID` = $idAqua");
}

echo 'Товар для аквариумов изменен';
