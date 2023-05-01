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
    <header></header>
    <div class="main-container">
        <div class="slider">
            <div class="slider-images" id="imagesSlider">
                
            </div>
            <div class="slider-items" id="itemsSlider">

            </div>
        </div>
    </div>
    <footer></footer>
    <script src="<?php echo $BASE_URL; ?>/js/sliderHome.js"></script>
</body>
</html>