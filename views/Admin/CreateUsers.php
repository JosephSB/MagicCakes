<?php
$BASE_URL = constant('URL') . "public";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crear Usuario | Magic Cakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <?php require 'views/components/head.php'; ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/css/admin/editCreateProduct.css" />
</head>

<body>
    <div class="admin-container">
        <?php require 'views/components/admin/aside.php'; ?>
        <div class="admin-main">
            <?php require 'views/components/admin/header.php'; ?>
            <form class="form-edit-product" action="<?php echo constant('URL'); ?>admin/usersAdmin/crear"
                method="POST">
                <div class="title">
                <p>CREAR USUARIO</p>
            </div>
                <div class="container">
                <div class="input-container">
                    <input name="name" type="text" placeholder="NOMBRE">
                </div>
                <div class="input-container">
                    <input name="lastname" type="text" placeholder="APELLIDO">
                </div>
                <div class="input-container">
                    <input name="email" type="text" placeholder="EMAIL">
                </div>
                <div class="input-container">
                    <input name="password" type="password" placeholder="CONTRASEÑA">
                </div>
                <div class="input-container">
                    <input name="number" type="number" placeholder="CELULAR">
                </div>
                <div class="input-container">
                    <input name="address" type="text" placeholder="DIRECCION">
                </div>
                <div class="input-container">
                    <select name="status" class="box">
                        <option value="0">INACTIVO</option>
                        <option value="1" selected>ACTIVO</option>
                    </select>
                </div>
                <p class="text-error"><?php echo $this->message; ?></p>
                <input type="submit" value="CREAR" class="button">
                </div>
            </form>
            <?php require 'views/components/admin/footer.php'; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

</body>

</html>