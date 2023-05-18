<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'views/components/head.php';  ?>
        <title><?php echo $this->product['title']; ?> | Magic Cakes</title>
        <meta name="description" content="<?php echo $this->product['description']; ?>">
        <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/detailProduct.css" />
    </head>

    <body>
        <?php require 'views/components/subheader.php';  ?>
        <?php require 'views/components/header.php';  ?>

        <div class="main-container">
            <section class="product-detail">
                <div class="product-info">
                    <h2><?php echo $this->product['title']; ?></h2>
                    <p class="description"><?php echo $this->product['description']; ?></p>
                    <div class="cantidad">
                        <label for="cantidad">Cantidad</label>
                        <div class="cantidad-botones">
                            <button class="boton-cantidad" onclick="restarCantidad()">-</button>
                            <input type="number" id="cantidad" readonly value="1" min="1" />
                            <button class="boton-cantidad" onclick="sumarCantidad()">+</button>
                        </div>
                    </div>
                    <div class="buttons">
                        <p class="price">
                            S/
                            <?php echo $this->product['price']; ?>
                        </p>
                        <button class="add-to-cart">Agregar al carrito</button>
                    </div>
                </div>
                <div class="product-image">
                    <img src="<?php echo $this->product['urllmage']; ?>" alt="Product Image" />
                </div>
            </section>
        </div>
        <?php require 'views/components/footer.php';  ?>
    </body>
</html>
