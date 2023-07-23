<?php
$BASE_URL = constant('URL') . "public";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Editar Usuarios | Magic Cakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <?php require 'views/components/head.php'; ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/css/admin/editCreateProduct.css" />
</head>

<body>
    <div class="admin-container">
        <?php require 'views/components/admin/aside.php'; ?>
        <div class="admin-main">
            <?php require 'views/components/admin/header.php'; ?>
            <form class="form-edit-product" action="<?php echo constant('URL'); ?>admin/usersAdmin/edit/<?php echo $this->idUser ?>" method="POST">
                <div class="title">
                    <p>ACTUALIZAR USUARIO</p>
                </div>
                <div class="container">
                    <div class="input-container">
                        <input name="name" type="text" value="<?php echo $this->data['name'] ?>" placeholder="NOMBRE">
                    </div>
                    <div class="input-container">
                        <input name="lastname" type="text" value="<?php echo $this->data['lastname'] ?>" placeholder="APELLIDO">
                    </div>
                    <div class="input-container">
                        <select class="form-select" name="role" id="role">
                            <option value="user" <?php echo $this->data['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                            <option value="admin" <?php echo $this->data['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <input name="email" type="text" value="<?php echo $this->data['email'] ?>" placeholder="EMAIL">
                    </div>
                    <div class="input-container">
                        <input name="phone" type="text" value="<?php echo $this->data['phone'] ?>" placeholder="CELULAR">
                    </div>
                    <div class="input-container">
                        <input name="address" type="text" value="<?php echo $this->data['address'] ?>" placeholder="DIRECCION">
                    </div>
                    <div class="input-container">
                        <select name="status" class="box">
                            <option value="0" <?php echo $this->data['status'] === 0 ? "selected" : "" ?>>INACTIVO</option>
                            <option value="1" <?php echo $this->data['status'] === 1 ? "selected" : "" ?>>ACTIVO</option>
                        </select>
                    </div>
                    <p class="text-error"><?php echo $this->message; ?></p>
                    <input type="submit" value="ACTUALIZAR" class="button">
                </div>
            </form>
            <?php require 'views/components/admin/footer.php'; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>