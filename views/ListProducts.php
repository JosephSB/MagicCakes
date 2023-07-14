<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'views/components/head.php';  ?>
        <title>Nuestros Productos | Magic Cakes</title>
        <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/home.css" />
        <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/listProducts.css" />
    </head>
    <body>
        <?php require 'views/components/subheader.php';  ?>
        <?php require 'views/components/header.php';  ?>
        <div class="main-container">
            <div class="container-offers">
                <div class="container-filters">
                    <div class="input-search">
                        <input type="text" id="inputSearch" placeholder="Buscar: " />
                        <div id="BtnSearch">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                    <div class="input-range" data-value="0" id="inputRange">
                        <p id="inputRangeName">Ordernar por</p>
                        <i class="fa-solid fa-angle-down"></i>
                        <div class="input-range-options" id="inputRangeOptions">
                            <p class="input-range-option" id="option-0">Todos</p>
                            <p class="input-range-option" id="option-2">De menor a mayor precio</p>
                            <p class="input-range-option" id="option-3">De mayor a menor precio</p>
                        </div>
                    </div>
                </div>
                <div class="container-cards-offers" id="containerProducts">
                    <div class="containerLoader" id="loader">
                        <div class="loader"></div>
                        <p>Cargando Productos</p>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'views/components/footer.php';  ?>
        <script src="<?php echo $BASE_URL; ?>/js/favorites.js"></script>
        <script src="<?php echo $BASE_URL; ?>/js/ListProducts.js"></script>
    </body>
</html>
