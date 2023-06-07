<?php
$BASE_URL = constant('URL') . "public";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    </style>
    <title>Usuarios | Magic Cakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <?php require 'views/components/head.php'; ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/css/admin/sectionsAdmin.css" />
</head>

<body>
    <div class="admin-container">
        <?php require 'views/components/admin/aside.php'; ?>
        <div class="admin-main">
            <?php require 'views/components/admin/header.php'; ?>
            <div class="title">
                <p>USUARIOS</p>
            </div>
            <div class="product-create">
                <a href="<?php echo  constant('URL'); ?>admin/usersAdmin/crear" class="button" >+ CREAR</a>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>ROL</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>CELULAR</th>
                        <th>DIRECCION</th>
                        <th>ESTADO</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </thead>
                    <?php if (!empty($this->users)): ?>
                        <?php foreach ($this->users as $user): ?>
                            <tbody>
                                <tr>

                                    <td class="align-middle" style="color: black;">
                                        <?php echo $user['user_id'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $user['role'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $user['name'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $user['email'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $user['phone'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $user['address'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <div class="status">
                                            <span class="<?php echo $user['status_class']; ?>-span">
                                                <?php echo $user['status']; ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="center-align">
                                        <a href="<?php echo  constant('URL'); ?>admin/usersAdmin/edit/<?php echo $user['user_id'] ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                                    </td>
                                    <td class="center-align">
                                        <a href="<?php echo  constant('URL'); ?>admin/usersAdmin/delete/<?php echo $user['user_id'] ?>"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-orders-message">
                            <h3>Aún no se han registrado usuarios.</h3>
                        </div>
                    <?php endif; ?>
                </table>
            </div>
            <?php require 'views/components/admin/footer.php'; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

</body>

</html>