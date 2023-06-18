<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $USERNAME = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
?>


<header class="admin-header">
    <a href="<?php echo  constant('URL'); ?>">
        <i class="fa-solid fa-arrow-left"></i>
        <span class="admin-user-title">regresar</span>
    </a>
    <p>&nbsp;</p>
    <div class="admin-user">
        <i class="fa fa-user-circle-o"></i>
        <span class="admin-user-title"><?php echo $USERNAME; ?></span>
    </div>
</header>