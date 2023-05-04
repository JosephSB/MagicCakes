<?php
    session_start();
    $USERNAME = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
?>


<div class="container-subheader">
    <div class="subheader">
        <?php if (isset($USERNAME)) : ?>
            <p><?php echo $USERNAME; ?></p>
        <?php else : ?>
            <p><a href="<?php echo  constant('URL'); ?>register">Registrate</a></p>&nbsp;|&nbsp;<p><a href="<?php echo  constant('URL'); ?>login">Iniciar Session</a></p>
        <?php endif; ?>
    </div>
</div>