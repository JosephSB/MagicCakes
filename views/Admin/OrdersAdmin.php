<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'views/components/head.php';  ?>
        <title>Nosotros | Magic Cakes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    </head>
    <body>
        <div class="main-container">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>TOTAL</th>
                    <th>ENVIO</th>
                    <th>PRECIO</th>
                    <th>PROVINCIA</th>
                    <th>DISTRITO</th>
                    <th>CLIENTE</th>
                    <th>TELEFONO</th>
                    <th>ESTADO</th>
                </thead>
                <?php if (!empty($this->orders)): ?>
                        <?php foreach($this->orders as $order): ?>
                <tbody>
                    <tr>
                        
                        <td><?php echo $order['order_id'] ?></td>
                        <td><?php echo $order['ammount'] ?></td>
                        <td><?php echo $order['shippingPrice'] ?></td>
                        <td><?php echo $order['totalNetPrice'] ?></td>
                        <td><?php echo $order['province'] ?></td>
                        <td><?php echo $order['district'] ?></td>
                        <td><?php echo $order['client'] ?></td>
                        <td><?php echo $order['phoneNumber'] ?></td>
                        <td><?php echo $order['status'] ?></td>
                        
                    </tr>
                </tbody>
                <?php endforeach; ?>
                        <?php else: ?>
                        <div class="no-orders-message">
                            <h3>Aún no se han registrado ordenes.</h3>
                        </div>
                        <?php endif; ?>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        
    </body>
</html>

