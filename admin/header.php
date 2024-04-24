<?php
session_start();
if (!isset($_SESSION['accountName']) || $_SESSION['accountName'] !== 'admin') {
    header('Location: ../');
}
?>

<link rel="stylesheet" href="../css/fonts.css">
<link rel="stylesheet" href="../css/header.css">

<div id="header-block">
    <div id="menu-block">
        <div id="linck-catalog">
            <a href="index.php" class="catalog-link">Главная</a>
        </div>
        <form action="search.php" id="search-form" method="get">
            <input type="search" name="search" id="search">
            <button type="submit" id="search-button">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </form>
    </div>
</div>