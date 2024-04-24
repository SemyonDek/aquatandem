<?php
require_once('../../config/connect.php');

$idProd = $_POST['idProd'];
$catIdProd = $_POST['catIdProd'];
$nameProd = $_POST['nameProd'];
$codeProd = $_POST['codeProd'];
$shorDescProd = $_POST['shorDescProd'];
$priceProd = $_POST['priceProd'];
$producerProd = $_POST['producerProd'];
$countryProd = $_POST['countryProd'];
$lightProd = $_POST['lightProd'];
$glassProd = $_POST['glassProd'];
$heightProd = $_POST['heightProd'];
$volumeProd = $_POST['volumeProd'];
$xSizeProd = $_POST['xSizeProd'];
$ySizeProd = $_POST['ySizeProd'];
$zSizeProd = $_POST['zSizeProd'];
$description = $_POST['description_prod'];

$saleProd = $_POST['saleProd'];
$newProd = $_POST['newProd'];

$color1Prod = $_POST['color1Prod'];
$color2Prod = $_POST['color2Prod'];
$color3Prod = $_POST['color3Prod'];
$color4Prod = $_POST['color4Prod'];
$color5Prod = $_POST['color5Prod'];

$Photos = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE `IDPROD`='$idProd'");
$Photos = mysqli_fetch_all($Photos, MYSQLI_ASSOC);

mysqli_query($ConnectDatabase, "UPDATE `products` SET 
`IDCAT` = '$catIdProd', `NAME` = '$nameProd', `CODE` = '$codeProd', `SHORTDESC` = '$shorDescProd', `PRICE` = '$priceProd', 
`PRODUCER` = '$producerProd', `CONTRY` = '$countryProd', `LIGHT` = '$lightProd', `GLASS` = '$glassProd', `HEIGHT` = '$heightProd',
`VOLUME` = '$volumeProd', `XSIZE` = '$xSizeProd', `YSIZE` = '$ySizeProd', `ZSIZE` = '$zSizeProd', `DESCRIPTION` = '$description' 
WHERE `products`.`ID` = $idProd");

mysqli_query($ConnectDatabase, "UPDATE `products_color` SET 
`COLOR1` = '$color1Prod', `COLOR2` = '$color2Prod', 
`COLOR3` = '$color3Prod', `COLOR4` = '$color4Prod', 
`COLOR5` = '$color5Prod' WHERE `products_color`.`IDPROD` = $idProd");

$SaleProdTable = mysqli_query($ConnectDatabase, "SELECT * FROM `products_sale` WHERE `IDPROD`='$idProd'");
$SaleProdTable = mysqli_fetch_assoc($SaleProdTable);
$NewProdTable = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new` WHERE `IDPROD`='$idProd'");
$NewProdTable = mysqli_fetch_assoc($NewProdTable);

if ($saleProd) {
    if (!isset($SaleProdTable)) {
        mysqli_query($ConnectDatabase, "INSERT INTO `products_sale` (`ID`, `IDPROD`) VALUES (NULL, '$idProd')");
    }
} else {
    mysqli_query($ConnectDatabase, "DELETE FROM products_sale WHERE `products_sale`.`IDPROD` = $idProd");
}
if ($newProd) {
    if (!isset($NewProdTable)) {
        mysqli_query($ConnectDatabase, "INSERT INTO `products_new` (`ID`, `IDPROD`) VALUES (NULL, '$idProd')");
    }
} else {
    mysqli_query($ConnectDatabase, "DELETE FROM products_new WHERE `products_new`.`IDPROD` = $idProd");
}

$length = count($Photos);
for ($i = 0; $i < 5; $i++) {
    if ($i < $length) {
        if ($_FILES['file_photo_' . $i + 1]['name'] == '') {
            if ($_POST['FilesDell_' . $i + 1] == 1) {

                $idPhoto = $Photos[$i]['ID'];
                unlink('../../' . $Photos[$i]['SRC']);
                mysqli_query($ConnectDatabase, "DELETE FROM products_img WHERE `products_img`.`ID` = $idPhoto");
            }
        } else {

            $typeFIle = substr($_FILES['file_photo_' . $i + 1]['name'], strrpos($_FILES['file_photo_' . $i + 1]['name'], '.') + 1);
            $urlNewFile = substr($Photos[$i]['SRC'], 0, strrpos($Photos[$i]['SRC'], '.'));
            $urlNewFile = $urlNewFile . '.' . $typeFIle;
            unlink('../../' . $Photos[$i]['SRC']);
            move_uploaded_file($_FILES['file_photo_' . $i + 1]['tmp_name'], '../../' . $urlNewFile);
            $idPhoto = $Photos[$i]['ID'];
            mysqli_query($ConnectDatabase, "UPDATE `products_img` SET `SRC` = '$urlNewFile' WHERE `products_img`.`ID` = '$idPhoto'");
        }
    } else if ($_FILES['file_photo_' . $i + 1]['name'] !== '') {

        $typeFIle = substr($_FILES['file_photo_' . $i + 1]['name'], strrpos($_FILES['file_photo_' . $i + 1]['name'], '.') + 1);

        $prov = True;
        while ($prov) {
            $fileName = uniqid() . '.' . $typeFIle;
            $fileUrl = '../../img/product/' . $fileName;
            $fileUrlDataBase = 'img/product/' . $fileName;

            if (!file_exists($fileUrl)) {
                move_uploaded_file($_FILES['file_photo_' . $i + 1]['tmp_name'], $fileUrl);

                mysqli_query($ConnectDatabase, "INSERT INTO `products_img` (`ID`, `IDPROD`, `SRC`) 
                VALUES (NULL, '$idProd', '$fileUrlDataBase')");

                $prov = False;
            }
        }
    }
}

echo 'Товар изменен';
