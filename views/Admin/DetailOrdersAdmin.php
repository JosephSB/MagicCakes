<?php
//6841-190043-6479376f-c005-4d46-7928-9b3788fc711e
$BASE_URL = constant('URL') . "public";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detalle de la Orden <?php echo $this->idOrder; ?> | Magic Cakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <?php require 'views/components/head.php'; ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/css/admin/sectionsAdmin.css" />
</head>

<body>
    <div class="admin-container">
        <?php require 'views/components/admin/aside.php'; ?>
        <div class="admin-main">
            <?php require 'views/components/admin/header.php'; ?>
            <div class=title>
                <p>DETALLE DE LA ORDEN <?php echo $this->idOrder; ?></p>
            </div>
            <div>
                <p><strong>CLIENTE:</strong>&nbsp;<?php echo $this->order['client']; ?></p>
                <p><strong>TELEFONO DEL CLIENTE:</strong>&nbsp;+51&nbsp;<?php echo $this->order['phoneNumber']; ?></p>
                <p><strong>TOTAL PRODUCTOS:</strong>&nbsp;<?php echo $this->order['ammount']; ?></p>
            </div>
            <div class="table-container" style="width: 100%; height: 400px">
                <div class="gmap" id="map" data-lat="<?php echo $this->order['lat']; ?>" data-lng="<?php echo $this->order['lng']; ?>"></div>
            </div>
            <br>
            <div>
                <p><strong>DELIVERYS DISPONIBLES</strong></p>
                <div 
                    class="list-deliverys" 
                    id="list-deliverys"
                    data-x="<?php echo $this->order['lat']; ?>"
                    data-y="<?php echo $this->order['lng']; ?>"
                    data-phone="<?php echo $this->order['phoneNumber']; ?>"
                    data-addressStreet="<?php echo $this->order['address']; ?>"
                    data-aditionalAdress="<?php echo $this->order['detail_address']; ?>"
                    data-client="<?php echo $this->order['client']; ?>"
                    data-city="<?php echo $this->order['district']; ?>"
                ></div>
                <div class="list-deliverys" style="min-height: 50px;">
                    <p>Powered by <img  width="100" height="30" src="https://cdn.worldvectorlogo.com/logos/pedidosya.svg" alt=""></p>
                </div>
            </div>
            <?php require 'views/components/admin/footer.php'; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="<?php echo $BASE_URL; ?>/js/DrawGoogleMap.js"></script>
        <script src="<?php echo $BASE_URL; ?>/js/PedidosYa.js"></script>
    </body>

</html>