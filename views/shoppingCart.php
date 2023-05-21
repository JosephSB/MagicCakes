<?php
$BASE_URL = constant('URL') . "public";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'views/components/head.php';  ?>
    <title>Mi carrito | Magic Cakes</title>
    <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/shoppingCart.css" />
</head>

<body>
    <?php require 'views/components/subheader.php';  ?>
    <?php require 'views/components/header.php';  ?>

    <div class="main-container">
        <div class="card-title">
            <h3>Carrito de compras</h3>
        </div>
        <div class="shoppingcart-body">
            <div class="shoppingcart-listItems" id="container-items-shoppingcart">
                <div class="containerLoader d-none" id="loader">
                    <div class="loader"></div>
                    <p>Cargando Productos</p>
                </div>
            </div>
            <div class="card">
                <div class="card-info">
                    <h3>Resumen</h3>
                    <ul>
                        <li>
                            <span>Precio con IGV</span>
                            <p id="grossPrice">0</p>
                        </li>
                        <li>
                            <span>Envio</span>
                            <p id="shipmentPrice">0</p>
                        </li>
                        <li>
                            <span>IGV(18%)</span>
                            <p id="igv">0</p>
                        </li>
                        <hr>
                        <li>
                            <span>Total de orden</span>
                            <p id="totalPrice">0</p>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="card-buy">
                    <a href="<?php echo  constant('URL'); ?>checkout">
                        <button>COMPRAR</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/components/footer.php';  ?>
    <script src="<?php echo $BASE_URL; ?>/js/myCart.js"></script>
</body>

</html>