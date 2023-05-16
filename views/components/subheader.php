<?php
if (session_status() === PHP_SESSION_NONE) { //AGREGUE PORQUE SE LLAMA ACA Y EN ORDERS
    session_start();
}
    $USERNAME = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
?>


<div class="container-subheader">
    <div class="subheader">
        <?php if (isset($USERNAME)) : ?>
            <p><?php echo $USERNAME; ?></p>
            <?php if ($_SESSION['role'] == "admin") : ?>
                <p><a href="<?php echo  constant('URL'); ?>admin"><i class="fa-solid fa-gauge-high"></i>&nbsp;Dashboard</a></p>
            <?php endif; ?>
            <p><a href="<?php echo  constant('URL'); ?>logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Logout</a></p>
        <?php else : ?>
            <p><a href="<?php echo  constant('URL'); ?>register">Registrate</a></p>&nbsp;|&nbsp;<p><a href="<?php echo  constant('URL'); ?>login">Iniciar Session</a></p>
        <?php endif; ?>
    </div>
</div>