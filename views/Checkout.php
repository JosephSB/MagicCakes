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
        <div id="app"></div>
    </div>
    <?php require 'views/components/footer.php';  ?>
    <script src="<?php echo $BASE_URL; ?>/js/bundles/payment.js"></script>
</body>

</html>