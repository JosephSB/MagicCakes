<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'views/components/head.php';  ?>
        <title>Contactanos | Magic Cakes</title>
        <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/contact.css" />
    </head>
    <body>
        <?php require 'views/components/subheader.php';  ?>
        <?php require 'views/components/header.php';  ?>
        <div class="main-container">
            <div class="contact-container">
                
                    <div class="title">
                        <p>Contáctate con nosotros</p>
                    </div>
                    <div class="top-body">
                        <p>Si necesitas comunicarte con nosotros, escríbenos un mensaje con tus datos y te responderemos lo más pronto posible.</p>
                    </div>
                    <div class="bottom-body">
                    <a href="https://api.whatsapp.com/send?phone=51963032870" target="_blank">
                    <i class="fa-brands fa-whatsapp fa-lg" style="color: #000000;"></i>
</a>
                    <p>963032870</p>
                </div>
                </div>
                
                
            
        </div>
        <?php require 'views/components/footer.php';  ?>
    </body>
</html>
