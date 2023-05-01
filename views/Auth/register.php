<?php
$BASE_URL = constant('URL') . "public";
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <?php require 'views/components/head.php';  ?>
    <meta charset="UTF-8">
    <title>Registrate | Magic Cakes</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/login.css">
</head>

<body>
    <form class="formulario">
        <div class="contenedor">
            <div style="text-align: center;">
                <a href="<?php echo  constant('URL'); ?>">
                    <img src="<?php echo  $BASE_URL; ?>/assets/magiccakes.png" width="200px" height="85px" alt="Magic Cakes">
                </a>
            </div>

            <div class="input-contenedor">
                <input type="email" placeholder="Correo Electronico">

            </div>

            <div class="input-contenedor">
                <input type="text" placeholder="Direccion">

            </div>

            <div class="input-contenedor">
                <input type="text" placeholder="Nombre">

            </div>

            <div class="input-contenedor">
                <input type="text" placeholder="Apellido">

            </div>
            <div class="input-contenedor">
                <input type="number" placeholder="Celular">

            </div>
            <div class="input-contenedor">
                <input type="password" placeholder="Contraseña">

            </div>
            <input type="submit" value="Registrarme" class="button">
            <p>¿Ya tienes una cuenta? <a class="link" href="<?php echo  constant('URL'); ?>login">Inicia Sesion </a></p>
        </div>
    </form>
</body>

</html>