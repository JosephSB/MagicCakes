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
            <div>
                
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
    <script src="<?php echo $BASE_URL; ?>/js/ListProducts.js"></script>
</body>
</html>