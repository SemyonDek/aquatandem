<?php
session_start();
require_once('../../config/connect.php');
$name = $_POST['nameUser'];
$mail = $_POST['mailUser'];
$number = $_POST['numberUser'];
$city = $_POST['cityUser'];
$address = $_POST['addressUser'];

$idUser = $_SESSION['accountId'];

mysqli_query($ConnectDatabase, "UPDATE `users` SET `NAME` = '$name', `MAIL` = '$mail', `NUMBER` = '$number', `CITY` = '$city', `ADDRESS` = '$address' WHERE `users`.`ID` = $idUser");

echo 'Данные изменены';
