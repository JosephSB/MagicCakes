<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'views/components/head.php';  ?>
    <title>Nuestros Productos | Magic Cakes</title>
    <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/home.css">
</head>
<body>
    <?php require 'views/components/subheader.php';  ?>
    <?php require 'views/components/header.php';  ?>
    <div class="main-container">

        <div class="container-offers">
            <div class="container-cards-offers">
                <div class="card-product">
                    <div class="card-product-containerImg">
                        <i class="fa-regular fa-heart card-product-icon"></i>
                        <img class="card-product-img" src="https://dxnn4n4cam0ol.cloudfront.net/media/catalog/product/b/a/bajas_bz1a6356_1.jpg">
                    </div>
                    <div class="card-product-body">
                        <p class="card-product-title">Magic red velvet</p>
                        <p class="card-product-description">3 discos de keke red velvet, relleno de un mix de frosting de queso crema con chantillí , 2 capas de fudge , frambuesas y blueberries . 4 porciones aprox. 11 cm de diámetro.</p>
                        <p class="card-product-price">s/99.00</p>
                        <button class="card-product-btn">COMPRAR</button>
                    </div>
                </div>
                <div class="card-product">
                    <div class="card-product-containerImg">
                        <i class="fa-regular fa-heart card-product-icon"></i>
                        <img class="card-product-img" src="https://dxnn4n4cam0ol.cloudfront.net/media/catalog/product/b/a/bajas_bz1a6356_1.jpg">
                    </div>
                    <div class="card-product-body">
                        <p class="card-product-title">Magic red velvet</p>
                        <p class="card-product-description">3 discos de keke red velvet, relleno de un mix de frosting de queso crema con chantillí , 2 capas de fudge , frambuesas y blueberries . 4 porciones aprox. 11 cm de diámetro.</p>
                        <p class="card-product-price">s/99.00</p>
                        <button class="card-product-btn">COMPRAR</button>
                    </div>
                </div>
                <div class="card-product">
                    <div class="card-product-containerImg">
                        <i class="fa-regular fa-heart card-product-icon"></i>
                        <img class="card-product-img" src="https://dxnn4n4cam0ol.cloudfront.net/media/catalog/product/b/a/bajas_bz1a6356_1.jpg">
                    </div>
                    <div class="card-product-body">
                        <p class="card-product-title">Magic red velvet</p>
                        <p class="card-product-description">3 discos de keke red velvet, relleno de un mix de frosting de queso crema con chantillí , 2 capas de fudge , frambuesas y blueberries . 4 porciones aprox. 11 cm de diámetro.</p>
                        <p class="card-product-price">s/99.00</p>
                        <button class="card-product-btn">COMPRAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/components/footer.php';  ?>
</body>
</html>