<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'views/components/head.php';  ?>
        <title>Mis Ordenes | Magic Cakes</title>
        <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/orders.css" />
    </head>
    <body>
        <?php require 'views/components/subheader.php';  ?>
        <?php require 'views/components/header.php';  ?>
        <div class="main-container">
            <div class="container-orders">
                
                <div class="card-title">
                        <div class="myOrders-container">    
                            <h3>Mis Ordenes </h3>
                        </div>
                    <div class="number-container">
                        <h5><?php echo $totalOrders = count($this->orders); ?> compras</h5>
                    </div>
                </div>

                <div class="orders-header">
                
                </div>
                <?php if (!empty($this->orders)): ?>
                <?php foreach($this->orders as $order): ?>
                <div class="card">
                    <div class="card-header">
                        <h2><?php echo $order['created']; ?></h2>
                    </div>
                    <div class="card-body">
                        <div class="left-body">
                        <div card-img>
                            <img src="<?php echo $order['image'] ?>" alt="Imagen del producto" />
                        </div>
                        <div class="card-description">
                            <h3><?php echo $order['status'] ?></h3>
                            <h4><?php echo $order['shipDate'] ?></h4>
                            <h1><?php echo $order['name'] ?></h1>
                            <p><?php echo $order['units'] ?> unidades</p>
                        </div>
                        </div>
                        <div class="right-body">
                        </div>
                    </div>
                    
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-orders-message">
                        <h3>Aún no se han registrado órdenes.</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php require 'views/components/footer.php';  ?>
    </body>
</html>