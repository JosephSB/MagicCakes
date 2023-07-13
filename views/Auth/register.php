<?php
$BASE_URL = constant('URL') . "public";
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <?php require 'views/components/head.php';  ?>
    <title>Registrate | Magic Cakes</title>
    <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/login.css">
</head>

<body>
    <form class="formulario" action="<?php echo  constant('URL'); ?>register" method="POST">
        <div class="contenedor">
            <div style="text-align: center;">
                <a href="<?php echo  constant('URL'); ?>">
                    <img src="<?php echo  $BASE_URL; ?>/assets/magiccakes.png" width="200px" height="85px" alt="Magic Cakes">
                </a>
            </div>

            <div class="input-contenedor">
                <input type="email" placeholder="Correo Electronico" name="email" require>
            </div>

            <div class="input-contenedor">
                <input type="text" placeholder="Direccion" name="address" require>
            </div>

            <div class="input-contenedor">
                <input type="text" placeholder="Nombre" name="name" require>
            </div>

            <div class="input-contenedor">
                <input type="text" placeholder="Apellido" name="lastname" require>
            </div>
            <div class="input-contenedor">
                <input type="number" oninput="limitarMaximoCaracteres(this, 9)"  placeholder="Celular" name="number" require>
            </div>
            <div class="input-contenedor">
                <input type="password" placeholder="Contraseña" name="password" require>
            </div>
            <input type="submit" value="REGISTRARME" class="button">
            <p class="text-error"><?php echo $this->message; ?></p>
            <p>¿Ya tienes una cuenta? <a class="link" href="<?php echo  constant('URL'); ?>login">Inicia Sesion </a></p>
        </div>
    </form>
    <script>
        function limitarMaximoCaracteres(elemento, maximoCaracteres) {
            if (elemento.value.length > maximoCaracteres) {
                elemento.value = elemento.value.slice(0, maximoCaracteres);
            }
        }
    </script>
</body>

</html>