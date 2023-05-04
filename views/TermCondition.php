<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'views/components/head.php';  ?>
        <title>Términos y Condiciones | Magic Cakes</title>
        <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/termCondition.css" />
    </head>
    <body>
        <?php require 'views/components/subheader.php';  ?>
        <?php require 'views/components/header.php';  ?>
        <div class="main-container">
            <div class="container-termcondition">
                <div class="container-termcondition-title">
                    <p class="abouts-title">Términos y Condiciones</p>
                </div>
                <div class="container-termcondition-body">
                    <div class="container-termcondition-subtitle">
                        <p>Notificación de cambios</p>
                    </div>
                    <div class="container-termcondition-info">
                        <p>Magic Cake SAC se reserva el derecho de cambiar estas condiciones de vez en cuando, según lo considere oportuno, y su uso continuo del sitio significará su aceptación de cualquier ajuste a estos términos.</p>
                    </div>
                    <div class="container-termcondition-subtitle">
                        <p>Pago</p>
                    </div>
                    <div class="container-termcondition-info">
                        <p>Todas las principales tarjetas de crédito / débito son métodos de pago aceptables. Todos los productos siguen siendo propiedad de Magic Cake SAC hasta que se pague en su totalidad.</p>
                    </div>
                    <div class="container-termcondition-subtitle">
                        <p>Política</p>
                    </div>
                    <div class="container-termcondition-info">
                        <p>
                            De cambios en su pedido se requiere un aviso mínimo de 24 horas. Se aceptarán notificaciones, por ejemplo, por correo electrónico, llamada telefónica o cualquier otro medio, sujeto a confirmación por escrito por
                            parte nuestra.
                        </p>
                    </div>
                    <div class="container-termcondition-subtitle">
                        <p>Terminación de acuerdos y política de reembolso</p>
                    </div>
                    <div class="container-termcondition-info">
                        <p>Una vez realizados los procedimientos de compra y efectuado el pago del mismo, no hay opción a cancelación ni devolución del dinero.</p>
                        <p>
                            Estos términos y condiciones forman parte del Acuerdo entre el Cliente y nosotros. El hecho de que acceda a este sitio web y realice una compra indica que comprende y acepta el Aviso de exención de
                            responsabilidad y los Términos y condiciones completos aquí especificados. Sus derechos legales del consumidor no se ven afectados.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'views/components/footer.php';  ?>
    </body>
</html>