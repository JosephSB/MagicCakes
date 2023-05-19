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
                            <button class="boton-cantidad" id="btn-less">-</button>
                            <input type="number" id="ammount" readonly value="1" min="1" />
                            <button class="boton-cantidad" id="btn-add">+</button>
                        </div>
                    </div>
                    <div class="buttons">
                        <p class="price" id="finalPrice" data-init="<?php echo $this->product['price']; ?>">
                            S/
                            <?php echo $this->product['price']; ?>
                        </p>
                        <button class="add-to-cart" id="btn-addToCart">Agregar al carrito</button>
                    </div>
                </div>
                <div class="product-image">
                    <img src="<?php echo $this->product['urllmage']; ?>" alt="Product Image" />
                </div>
            </section>
        </div>
        <?php require 'views/components/footer.php';  ?>
        <script async  src="<?php echo $BASE_URL; ?>/js/shoppingCart.js"></script>
    </body>
</html>
