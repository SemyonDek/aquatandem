<?php
require_once('config/favourites.php');
if (isset($_SESSION['accountId'])) {
    $idUser = $_SESSION['accountId'];
} else {
    $idUser = 0;
}
?>

<link rel="stylesheet" href="css/footer.css">

<footer>
    <div id="footer_info">
        <img src="img/main/logotype.png" alt="" class="footer_logo">
        <p class="footer_info_text">
            Интернет-магазин аквариумов "АкваТандем"
            <br>
            Продажа и обслуживание аквариумов в Москве,
            <br>
            Московской области и регионах России
        </p>
        <p class="footer_info_link">
            8 (800) 555-21-46
        </p>
        <p class="footer_info_text">
            Звонки по России бесплатно
        </p>
        <p class="footer_info_link">
            aquatandem@gmail.com
        </p>
        <p class="footer_info_text">
            Работаем 09:00–20:00, без выходных
        </p>
    </div>
    <div id="footer_link">
        <h1 class="footer_link_title">Присоединяйся к нам</h1>
        <a href=""><img src="img/main/footer-link/vk-social-logotype-svgrepo-com.png" alt="" class="footer_link_item-img"></a>
        <a href=""><img src="img/main/footer-link/instagram-social-media-svgrepo-com.png" alt="" class="footer_link_item-img"></a>
        <a href=""><img src="img/main/footer-link/telegram-svgrepo-com.png" alt="" class="footer_link_item-img"></a>
        <a href=""><img src="img/main/footer-link/facebook-fill-svgrepo-com.png" alt="" class="footer_link_item-img"></a>
    </div>
</footer>


<div id="button_line">
    <div class="button_line_item">
        <a href="compare.php">
            <div class="button_item_content">
                <img src="img/main/compare-svgrepo-com.png" alt="" class="button_item_content_img">
                Сравниваем (<span id="srav_value">
                    <?php
                    if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
                        echo ' ' . count($_SESSION['comprasion']) . ' ';
                    } else echo 0;
                    ?>
                </span>)
            </div>
        </a>
    </div>
    <div class="button_line_item">
        <?php
        if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') {
        ?>
            <a href="favourites.php">
                <div class="button_item_content">
                    <img src="img/main/heart-svgrepo-com.png" alt="" class="button_item_content_img">
                    Избранные (<span id="izb_value"><?= countFavourit($FavouritTable, $idUser) ?></span>)
                </div>
            </a>
        <?php
        }
        ?>
    </div>
    <div class="button_line_item">
        <?php
        if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') {
        ?>
            <a href="account.php">
                <div class="button_item_content">
                    <img src="img/main/user-svgrepo-com.png" alt="" class="button_item_content_img">
                    Аккаунт
                </div>
            </a>
        <?php
        }
        ?>
    </div>
    <div class="button_line_item">
        <?php
        if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') {
        ?>
            <a href="functions/account/logout.php">
                <div class="button_item_content">
                    <img src="img/main/key-svgrepo-com.png" alt="" class="button_item_content_img">
                    Выход
                </div>
            </a>
        <?php
        } else {
        ?>
            <a href="#modal-login">
                <div class="button_item_content">
                    <img src="img/main/key-svgrepo-com.png" alt="" class="button_item_content_img">
                    Вход
                </div>
            </a>

        <?php
        }
        ?>
    </div>
</div>

<div id="modal-login">
    <a href="#close">
    </a>
    <div id="modal-block-login">
        <h1 class="title-login">
            Авторизация
        </h1>
        <form action="" id="login_form">
            <p class="text-login">Логин:</p>
            <input type="text" class="input-login" name="login">
            <p class="text-login">Пароль:</p>
            <input type="password" class="input-login" name="password">
            <input id="logButton" type="button" value="Войти" class="input-login-button">
        </form>
        <a href="#close">
            <img src="img/main/close-svgrepo-com.png" alt="" class="close-login">
        </a>
    </div>
</div>

<script src="script/login.js"></script>
<script src="script/basket.js"></script>