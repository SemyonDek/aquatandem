<?php
require_once('connect.php');

$SliderList = mysqli_query($ConnectDatabase, "SELECT * FROM `banner`");
$SliderList = mysqli_fetch_all($SliderList, MYSQLI_ASSOC);

function addSliderAdmUpd($SliderList)
{
    foreach ($SliderList as $item) {
?>
        <div class="item-img-banner">
            <img src="../<?= $item['SRC'] ?>" alt="" class="img-item">
            <input class="del-item-banner" type="button" value="Удалить" onclick="delSlider(<?= $item['ID'] ?>)">
        </div>
    <?php
    }
}
function addSliderAdmIndex($SliderList)
{
    foreach ($SliderList as $item) {
    ?>
        <img src="../<?= $item['SRC'] ?>" alt="" class="img-slider-img">

    <?php
    }
}
function addSliderIndex($SliderList)
{
    foreach ($SliderList as $item) {
    ?>
        <img src="<?= $item['SRC'] ?>" alt="" class="img-slider-img">
<?php
    }
}
