<?php
require_once('connect.php');

$FavouritTable = mysqli_query($ConnectDatabase, "SELECT * FROM `favourites`");
$FavouritTable = mysqli_fetch_all($FavouritTable, MYSQLI_ASSOC);
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
$PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);

function countFavourit($FavouritTable, $idUser)
{
    $countFav = 0;
    foreach ($FavouritTable as $item) {
        if ($item['IDUSER'] == $idUser) {
            $countFav++;
        }
    }
    echo $countFav;
}

function listFavourit($FavouritTable, $TableProdAll, $PhotosProdList)
{
    foreach ($FavouritTable as $itemFavorit) {
        foreach ($TableProdAll as $itemProd) {
            if ($itemProd['ID'] == $itemFavorit['IDPROD']) {
                $imgSrc = '';
                foreach ($PhotosProdList as $itemPhotos) {
                    if ($itemPhotos['IDPROD'] == $itemProd['ID']) {
                        $imgSrc = $itemPhotos['SRC'];
                        break;
                    }
                }

?>
                <div class="item-product">
                    <a href="product-card.php?idProd=<?= $itemProd['ID'] ?>">
                        <div class="img-item-product-block">
                            <img src="<?= $imgSrc ?>" alt="" class="img-item-product">
                        </div>
                    </a>
                    <div class="text-item-product-block">
                        <a href="product-card.php?idProd=<?= $itemProd['ID'] ?>">
                            <h3 class="name-item-prod">
                                <?= $itemProd['NAME'] ?>
                            </h3>
                        </a>
                        <p class="desc-item-prod">
                            <?= $itemProd['SHORTDESC'] ?>
                        </p>
                        <p class="price-item-prod">
                            Цена:
                            <span class="price-value-item-prod">
                                <?= number_format($itemProd['PRICE'], 0, '.', ' ') . ' ' ?>
                                <span class="rub-item-prod">
                                    руб
                                </span>
                            </span>
                        </p>
                    </div>
                    <button class="del-item-favourites_button" type="button" onclick="delFavourit(<?= $itemFavorit['ID'] ?>)">
                        <img src="img/main/close-cross-in-circular-outlined-interface-button-svgrepo-com.png" alt="" class="del-item-favourites">
                    </button>
                </div>
<?php
            }
        }
    }
}
