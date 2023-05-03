<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'views/components/head.php';  ?>
    <title>Nuestras Tiendas | Magic Cakes</title>
    <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/stores.css">
</head>
<body>
    <?php require 'views/components/subheader.php';  ?>
    <?php require 'views/components/header.php';  ?>
    <div class="main-container">
            <div class="container-stores">
                <div class="container-img-stores"></div>
                <div class="container-title-stores">
                    <p class="title-stores">Nuestras Tiendas</p>
                </div>
                <div class="container-cards-stores">
                    <div class="card-stores">
                        <div class="card-stores-containerImg">
                            <img class="card-stores-img" src="<?php echo  $BASE_URL; ?>/assets/store1.png" />
                        </div>
                        <div class="card-stores-body">
                            <p class="card-stores-title">MC La Encalada</p>
                            <p class="card-stores-info">Av La Encalada 1182. Surco</p>
                            <p class="card-stores-info">Horario de Atención: Lunes a Domingo - 9:00am a 8:00pm</p>
                            <a class="card-stores-btn" target="_blank" href="http://www.google.com/maps/place/-12.1052,-76.970659">Ver Ubicacion</a>
                        </div>
                    </div>
                    <div class="card-stores">
                        <div class="card-stores-containerImg">
                            <img class="card-stores-img" src="<?php echo  $BASE_URL; ?>/assets/store2.png" />
                        </div>
                        <div class="card-stores-body">
                            <p class="card-stores-title">MC San Miguel</p>
                            <p class="card-stores-info">Av La Marina 2530, San Miguel</p>
                            <p class="card-stores-info">Horario de Atención: Lunes a Domingo - 9:00am a 8:00pm</p>
                            <a class="card-stores-btn" target="_blank" href="http://www.google.com/maps/place/-12.0774249,-77.0903157">Ver Ubicacion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php require 'views/components/footer.php';  ?>
</body>
</html>