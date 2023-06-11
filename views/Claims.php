<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'views/components/head.php';  ?>
        <title>Reclamos | Magic Cakes</title>
        <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/claim.css" />
    </head>
    <body>
        <?php require 'views/components/subheader.php';  ?>
        <?php require 'views/components/header.php';  ?>
        <div class="main-container">
            <div class="contact-container">
                <div class="contact-container-left">
                    <div class="left-title">
                        <p>Para reclamos contáctate con nosotros</p>
                    </div>
                    <div class="left-body">
                        <p>Si necesitas realizar un reclamo, escríbenos un mensaje con tus datos y te devolveremos la llamada lo más pronto posible.</p>
                    </div>
                </div>
                <form class="form-contact" action="<?php echo  constant('URL'); ?>claim" method="POST">
                    <div class="contact-container-right">
                        <div class="input-container">
                            <input class="name" type="text" placeholder="Nombre" name="name" require />
                        </div>
                        <div class="input-container">
                            <input class="lastname" type="text" placeholder="Apellido" name="lastname" require />
                        </div>
                        <div class="input-container">
                            <input type="email" placeholder="Correo Electronico" name="email" require />
                        </div>
                        <div class="input-container">
                            <input type="number" placeholder="Celular" name="number" require />
                        </div>
                        <div class="input-container">
                            <textarea name="area_message" placeholder="Déjanos un mensaje" cols="30" rows="10" style="width: 100%; height: 103px;"></textarea>
                        </div>
                        <input type="submit" value="ENVIAR" class="button" />
                        <p class="text-error"><?php echo $this->message; ?></p>
                    </div>
                </form>
            </div>
        </div>
        <?php require 'views/components/footer.php';  ?>
    </body>
</html>
