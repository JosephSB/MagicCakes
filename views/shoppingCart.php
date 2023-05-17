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
        <div></div>
            <div class="card">
                <div class="card-info">
                    <h3>Resumen</h3>
                    <ul>
                        <li>
                            <span>Precio con IGV</span>
                            <input type="number" placeholder="">
                        </li>
                        <li>
                            <span>Envio</span>
                            <input type="number" placeholder="">
                        </li>
                        <li>
                            <span>IGV(18%)</span>
                            <input type="number" placeholder="">
                        </li>
                        <hr>
                        <li>
                            <span>Total de orden</span>
                            <input type="number" placeholder="">
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="card-buy">
                    <button>COMPRAR</button>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/components/footer.php';  ?>
</body>

</html>