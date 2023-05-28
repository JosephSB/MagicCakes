<?php
    $BASE_URL = constant('URL')."public";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'views/components/head.php';  ?>
    <title>Admin | Magic Cakes</title>
    <link rel="stylesheet" href="<?php echo  $BASE_URL; ?>/css/admin/home.css">
</head>
<body>
    <div class="admin-container">
        <?php require 'views/components/admin/aside.php';  ?>
        <div class="admin-main">
            <?php require 'views/components/admin/header.php';  ?>
            <div class="admin-home">
                <p>Home</p>
            </div>
            <?php require 'views/components/admin/footer.php';  ?>
        </div>
    </div>
</body>
</html>