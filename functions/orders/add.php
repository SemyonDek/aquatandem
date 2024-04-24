<?php
session_start();
require_once('../../config/connect.php');

$date = date('d.m.Y') . ' г.';
$amountOrder = $_SESSION['basketSum'];
$name = $_POST['nameUser'];
$mail = $_POST['mailUser'];
$number = $_POST['numberUser'];
$city = $_POST['cityUser'];
$address = $_POST['addressUser'];

if (isset($_SESSION['accountId'])) {
    $idAccount = $_SESSION['accountId'];
} else {
    $idAccount = 0;
}

mysqli_query($ConnectDatabase, "INSERT INTO `orders` 
    (`ID`, `IDUSER`, `DATE`, `STATUS`, `AMOUNT`, `NAME`, `MAIL`, `NUMBER`, `CITY`, `ADDRESS`) VALUES 
    (NULL, '$idAccount', '$date' , 1, '$amountOrder', '$name', '$mail', '$number', '$city', '$address')");

$idOrder = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `orders`");
$idOrder = mysqli_fetch_all($idOrder);
$idOrder = $idOrder[0][0];

foreach ($_SESSION['basket'] as $item) {
    $idProd = $item['ID'];
    $color = $item['COLOR'];
    $value = $item['VALUE'];
    $amount = $item['AMOUNT'];

    mysqli_query($ConnectDatabase, "INSERT INTO `order_item` 
        (`IDORDER`, `IDPROD`, `COLOR`, `QUANTITY`, `AMOUNT`) VALUES 
        ('$idOrder', '$idProd', '$color', '$value', '$amount')");
}

$_SESSION['basket'] = [];
$_SESSION['basketSum'] = 0;
$_SESSION['countBasket'] = 0;

echo 'Заказ оформлен';
