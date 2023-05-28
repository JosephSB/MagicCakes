<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $USERNAME = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
?>


<header class="admin-header">
    <div class="admin-user">
        <i class="fa fa-user-circle-o"></i>
        <span class="admin-user-title"><?php echo $USERNAME; ?></span>
    </div>
</header>