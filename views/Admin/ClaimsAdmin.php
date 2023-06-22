<?php
$BASE_URL = constant('URL') . "public";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    </style>
    <title>Reclamos | Magic Cakes</title>
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
                <p>RECLAMOS</p>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>CELULAR</th>
                        <th>MENSAJE</th>
                        <th>ESTADO</th>
                    </thead>
                    <?php if (!empty($this->claims)): ?>
                        <?php foreach ($this->claims as $claim): ?>
                            <tbody>
                                <tr>

                                    <td class="align-middle" style="color: black;">
                                        <?php echo $claim['id'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $claim['name'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $claim['email'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $claim['phone'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $claim['message'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <form
                                            action="<?php echo constant('URL'); ?>admin/claimsAdmin/edit/<?php echo $claim['claim_id']; ?>"
                                            method="POST">
                                            <div class="input-group">
                                                <select
                                                    class="form-select <?php echo intval($claim['status']) === 0 ? 'select-entregado' : (intval($claim['status']) === 1 ? 'select-cancelado' : ''); ?>"
                                                    name="status" id="status">
                                                    <option value="0" <?php echo intval($claim['status']) === 0 ? 'selected' : ''; ?>>Pendiente</option>
                                                    <option value="1" <?php echo intval($claim['status']) === 1 ? 'selected' : ''; ?>>Finalizado</option>
                                                </select>
                                                <button class="button-orders" type="submit">Guardar</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-orders-message">
                            <h3>Aún no se han registrado reclamos.</h3>
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