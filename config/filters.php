<?php

if (isset($_GET['search']) && $_GET['search'] !== '') {
    $search = '%' . $_GET['search'] . '%';
    $searchStr = "AND (
        `NAME` LIKE '$search' or 
        `CODE` LIKE '$search')";
} else $searchStr = '';

if (isset($_GET['idCat']) && $_GET['idCat'] !== '' && !preg_match('/\s/', $_GET['idCat'])) {
    $idCatProd = "AND `IDCAT` = '" . $_GET['idCat'] . "'";
} else $idCatProd = '';

if (isset($_GET['producer_select']) && $_GET['producer_select'] !== '' && !preg_match('/\s/', $_GET['producer_select'])) {
    $idProducer = "AND `PRODUCER` = '" . $_GET['producer_select'] . "'";
} else $idProducer = '';

if (isset($_GET['min_price']) && ($_GET['min_price'] !== '' && !preg_match('/\s/', $_GET['min_price']))) {
    $min_prod_mass = $_GET['min_price'];;
} else {
    $min_prod_mass = 0;
}

if (isset($_GET['max_price']) && ($_GET['max_price'] !== '') && !preg_match('/\s/', $_GET['max_price'])) {
    $max_prod_mass = $_GET['max_price'];
} else {
    $max_prod_mass = 3000000000;
}

if (isset($_GET['min_value']) && ($_GET['min_value'] !== '' && !preg_match('/\s/', $_GET['min_value']))) {
    $min_prod_mass_value = $_GET['min_value'];;
} else {
    $min_prod_mass_value = 0;
}

if (isset($_GET['max_value']) && ($_GET['max_value'] !== '') && !preg_match('/\s/', $_GET['max_value'])) {
    $max_prod_mass_value = $_GET['max_value'];
} else {
    $max_prod_mass_value = 3000000000;
}

if (isset($_GET['min_xsize']) && ($_GET['min_xsize'] !== '' && !preg_match('/\s/', $_GET['min_xsize']))) {
    $min_prod_mass_xsize = $_GET['min_xsize'];;
} else {
    $min_prod_mass_xsize = 0;
}

if (isset($_GET['max_xsize']) && ($_GET['max_xsize'] !== '') && !preg_match('/\s/', $_GET['max_xsize'])) {
    $max_prod_mass_xsize = $_GET['max_xsize'];
} else {
    $max_prod_mass_xsize = 3000000000;
}

if (isset($_GET['min_ysize']) && ($_GET['min_ysize'] !== '' && !preg_match('/\s/', $_GET['min_ysize']))) {
    $min_prod_mass_ysize = $_GET['min_ysize'];;
} else {
    $min_prod_mass_ysize = 0;
}

if (isset($_GET['max_ysize']) && ($_GET['max_ysize'] !== '') && !preg_match('/\s/', $_GET['max_ysize'])) {
    $max_prod_mass_ysize = $_GET['max_ysize'];
} else {
    $max_prod_mass_ysize = 3000000000;
}

if (isset($_GET['min_zsize']) && ($_GET['min_zsize'] !== '' && !preg_match('/\s/', $_GET['min_zsize']))) {
    $min_prod_mass_zsize = $_GET['min_zsize'];;
} else {
    $min_prod_mass_zsize = 0;
}

if (isset($_GET['max_zsize']) && ($_GET['max_zsize'] !== '') && !preg_match('/\s/', $_GET['max_zsize'])) {
    $max_prod_mass_zsize = $_GET['max_zsize'];
} else {
    $max_prod_mass_zsize = 3000000000;
}

if (isset($_GET['sort_select']) && $_GET['sort_select'] !== '') {
    if ($_GET['sort_select'] == 0) {
        $sort = 'ORDER BY `PRICE` ASC';
    } else {
        $sort = 'ORDER BY `PRICE` DESC';
    }
} else $sort = '';
