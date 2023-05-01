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
    <?php require 'views/components/header.php';  ?>
    <div class="main-container">
        <div class="slider">
            <div class="container-slider-images" id="ContainerImagesSlider">
                <div class="slider-images-box box-prev" id="boxPrevSlider">
                    <i class="fa-solid fa-caret-left fa-2x"></i>
                </div>
                <div class="slider-images-box box-next" id="boxNextSlider">
                    <i class="fa-solid fa-caret-right fa-2x"></i>
                </div>
                <div class="slider-images" id="imagesSlider"></div>
            </div>
            <div class="slider-items" id="itemsSlider"></div>
        </div>
    </div>
    <?php require 'views/components/footer.php';  ?>
    <script src="<?php echo $BASE_URL; ?>/js/sliderHome.js"></script>
</body>
</html>