<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'views/components/head.php';  ?>
    <title>Nuestras Tiendas | Magic Cakes</title>
    <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/aboutUs.css">
</head>
<body>
    <?php require 'views/components/subheader.php';  ?>
    <?php require 'views/components/header.php';  ?>
    <div class="main-container">
            <div class="container-aboutus">
                <div class="container-aboutus-title">
                    <p class="abouts-title">Sobre Magic Cakes</p>
                </div>
                <div class="container-aboutus-body">
                    <div class="container-aboutus-info">
                        <p>¡Bienvenid@ a Magic Cakes, una familia lista para engreírte con los postres más ricos!Con el único objetivo de hacer tu día mejor.</p>
                        <p>En Magic Cakes queremos sumarle a tu vida más momentos felices y porque el dulce siempre mejora nuestros días, tenemos esta filosofía: ¡El día siempre está para un postre!</p>
                        <p>Empecemos a disfrutar más, celebremos juntos los grandes y pequeños detalles de la vida, endulcemos las amarguras y resaltemos los logros.</p>
                        <p>Pero lo más importante, es que queremos que disfrutes sintiéndote en casa desde el primer bocado. Por eso elegimos los mejores insumos, preparando cada postre con el mismo amor y dedicación desde el primer día, como me enseñó mi abuela a preparar las recetas familiares. Perfeccionándolos e innovándolos en el tiempo, para darte siempre lo mejor, con ese sabor de casa que los caracteriza.</p>
                    </div>
                    <div class="container-aboutus-img">
                        <img class="aboutus-img" src="<?php echo  $BASE_URL; ?>/assets/aboutUs.png" width=450px;/>
                    </div>
                </div>                
            </div>
        </div>
    <?php require 'views/components/footer.php';  ?>
</body>
</html>