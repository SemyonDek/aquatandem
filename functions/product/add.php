<?php
require_once('../../config/connect.php');

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


mysqli_query($ConnectDatabase, "INSERT INTO `products` 
(`ID`, `IDCAT`, `NAME`, `CODE`, `SHORTDESC`, 
`PRICE`, `PRODUCER`, `CONTRY`, `LIGHT`, `GLASS`, 
`HEIGHT`, `VOLUME`, `XSIZE`, `YSIZE`, `ZSIZE`, 
`DESCRIPTION`) VALUES 
(NULL, '$catIdProd', '$nameProd', '$codeProd', '$shorDescProd', 
'$priceProd', '$producerProd', '$countryProd', '$lightProd', '$glassProd', 
'$heightProd', '$volumeProd', '$xSizeProd', '$ySizeProd', '$zSizeProd', 
'$description')");

$idProd = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `products`");
$idProd = mysqli_fetch_all($idProd);
$idProd = $idProd[0][0];

if ($saleProd) {
    mysqli_query($ConnectDatabase, "INSERT INTO `products_sale` (`ID`, `IDPROD`) VALUES (NULL, '$idProd')");
}
if ($newProd) {
    mysqli_query($ConnectDatabase, "INSERT INTO `products_new` (`ID`, `IDPROD`) VALUES (NULL, '$idProd')");
}

mysqli_query($ConnectDatabase, "INSERT INTO `products_color` 
(`IDPROD`, `COLOR1`, `COLOR2`, `COLOR3`, `COLOR4`, `COLOR5`) VALUES 
('$idProd', '$color1Prod', '$color2Prod', '$color3Prod', '$color4Prod', '$color5Prod')");

foreach ($_FILES as $key => $item) {
    if ($item['name'] !== '') {
        $typeFIle = substr($item['name'], strrpos($item['name'], '.') + 1);

        $prov = True;
        while ($prov) {
            $fileName = uniqid() . '.' . $typeFIle;
            $fileUrl = '../../img/product/' . $fileName;
            $fileUrlDataBase = 'img/product/' . $fileName;

            if (!file_exists($fileUrl)) {
                move_uploaded_file($item['tmp_name'], $fileUrl);

                mysqli_query($ConnectDatabase, "INSERT INTO `products_img` (`ID`, `IDPROD`, `SRC`) 
                    VALUES (NULL, '$idProd', '$fileUrlDataBase')");

                $prov = False;
            }
        }
    }
}

echo 'Товар добавлен';
