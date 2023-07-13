<?php
$BASE_URL = constant('URL') . "public";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'views/components/head.php'; ?>
    <title>Mis Favoritos | Magic Cakes</title>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/css/home.css" />
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/css/listProducts.css" />
</head>

<body>
    <?php require 'views/components/subheader.php'; ?>
    <?php require 'views/components/header.php'; ?>
    <div class="main-container">
        <div class="container-offers">

            <div class="container-bottom">
                <div class="container-cards-offers" id="containerProducts">
                    <?php if (!empty($this->orders)): ?>
                        <?php foreach ($this->orders as $orders): ?>
                            <div class="card-product" data-productid="<?php echo $orders['id']; ?>">
                                <div class="card-product-containerImg">
                                    <i class="fa-solid fa-heart card-product-icon active"
                                        data-id="<?php echo $orders['id']; ?>"></i>
                                    <img class="card-product-img" src="<?php echo $orders['image']; ?>">
                                </div>
                                <div class="card-product-body">
                                    <?php if (!$orders['stock'] || $orders['stock'] === 0): ?>
                                        <div class="card-product-spam card-product-spam-err">
                                            <p>Sin stock</p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($orders['stock'] > 0 && $orders['stock'] < 10): ?>
                                        <div class="card-product-spam card-product-spam-medium">
                                            <p>Ultimos productos</p>
                                        </div>
                                    <?php endif; ?>
                                    <p class="card-product-title">
                                        <?php echo $orders['title']; ?>
                                    </p>
                                    <p class="card-product-description">
                                        <?php echo strlen($orders['description']) > 100 ? substr($orders['description'], 0, 100) . "..." : $orders['description']; ?>
                                    </p>
                                    <p class="card-product-price">
                                        s/&nbsp;<?php echo (number_format($orders['price'], 2, '.', '.')); ?>
                                    </p>
                                    <a href="<?php echo '/products/detail/' . $orders['id']; ?>">
                                        <button class="card-product-btn">COMPRAR</button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    </div>
    <?php require 'views/components/footer.php'; ?>
    <script src="<?php echo $BASE_URL; ?>/js/favorites.js"></script>
    <script>
        listenAllBtnsFav()
    </script>
</body>

</html>