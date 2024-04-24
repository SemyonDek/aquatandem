<?php
require_once('../../config/connect.php');

$nameAqua = $_POST['nameAqua'];
$descAqua = $_POST['descAqua'];
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

mysqli_query($ConnectDatabase, "INSERT INTO `product_aqua` (`ID`, `SRC`, `TITLE`, `DESCR`) VALUES (NULL, '$srcImgAqua', '$nameAqua', '$descAqua')");

echo 'Товар для аквариумов добавлен';
