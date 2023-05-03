<?php
    $BASE_URL = constant('URL')."public";
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <?php require 'views/components/head.php';  ?>
    <title>Iniciar Sesion | Magic Cakes</title>
    <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/login.css">
</head>

<body>

    <form class="formulario" action="<?php echo  constant('URL'); ?>login" method="POST">
        <div class="contenedor">
            <div class="image-contenedor">
                <a href="<?php echo  constant('URL'); ?>">
                    <img src="<?php echo  $BASE_URL; ?>/assets/magiccakes.png" width="200px" height="85px" alt="Magic Cakes">
                </a>
            </div>


            <div class="input-contenedor">
                <input type="email" placeholder="Correo Electronico" name="email" autocomplete="off">
            </div>

            <div class="input-contenedor">
                <input type="password" placeholder="Contraseña" name="password" autocomplete="off">
            </div>
            <input type="submit" value="INICIAR SESION" class="button">
            <p class="text-error"><?php echo $this->message; ?></p>
            <p>¿No tienes una cuenta? <a class="link" href="<?php echo  constant('URL'); ?>register">Registrate </a></p>
        </div>
    </form>
</body>

</html>