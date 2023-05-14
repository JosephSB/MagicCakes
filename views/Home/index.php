<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'views/components/head.php';  ?>
    <title>Magic Cakes</title>
    <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/home.css">
</head>
<body>
    <?php require 'views/components/subheader.php';  ?>
    <?php require 'views/components/header.php';  ?>
    <div class="main-container">
        <div class="slider">
            <div class="container-slider-images" id="ContainerImagesSlider">
                <div class="slider-images-box box-prev" id="boxPrevSlider">
                    <i class="fa-solid fa-caret-left "></i>
                </div>
                <div class="slider-images-box box-next" id="boxNextSlider">
                    <i class="fa-solid fa-caret-right "></i>
                </div>
                <div class="slider-images" id="imagesSlider"></div>
            </div>
            <div class="slider-items" id="itemsSlider"></div>
        </div>
        <div class="container-offers">
            <p class="title-offers">Nuestros productos populares</p>
            <div class="container-cards-offers" id="containerProducts">
                <div class="containerLoader" id="loader">
                    <div class="loader"></div>
                    <p>Cargando Productos</p>
                </div>
            </div>
            <a href="<?php echo constant('URL')?>products">
                <p class="container-offers-link">Ver todos los productos&nbsp;<i class="fa-solid fa-arrow-right"></i></p>
            </a>
        </div>
        <div class="container-info">
            <div class="title">
                <h2>¿Por qué elegirnos?</h2>
            </div>
            <div class="items">
                <div class="left">
                    <img src="<?php echo  $BASE_URL; ?>/assets/cup.png" height="67px">
                    <div class="subtitle">
                        <p>Siéntete en casa con las recetas de Magic Cakes</p>
                    </div>
                    <div class="message">
                        <p>Usamos ingredientes seleccionados y cuidamos nuestras recetas para mantener la misma calidad y sabor de casa de siempre, ofreciendo un producto fresco y sin preservantes.</p>
                    </div>
                </div>
                <div class="right">
                    <img src="<?php echo  $BASE_URL; ?>/assets/note.png" height="67px">
                    <div class="subtitle">
                        <p>Magic Cakes te cuida</p>
                    </div>
                    <div class="message">
                        <p>Cumplimos con protocolos de bioseguridad y buenas prácticas de manufactura en todas las fases de nuestro proceso de producción y despacho para asegurarnos de la inocuidad de nuestros productos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/components/footer.php';  ?>
    <script src="<?php echo $BASE_URL; ?>/js/sliderHome.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/favorites.js"></script>
    <script src="<?php echo $BASE_URL; ?>/js/ListPopularProducts.js"></script>
</body>
</html>