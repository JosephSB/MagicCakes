<?php
$BASE_URL = constant('URL') . "public";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ordenes | Magic Cakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <?php require 'views/components/head.php'; ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/css/admin/sectionsAdmin.css" />
</head>

<body>
    <div class="admin-container">
        <?php require 'views/components/admin/aside.php'; ?>
        <div class="admin-main">
            <?php require 'views/components/admin/header.php'; ?>
            <div class=title>
                <p>ORDENES</p>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>TOTAL</th>
                        <th>ENVIO</th>
                        <th>PRECIO</th>
                        <th>PROVINCIA</th>
                        <th>DISTRITO</th>
                        <th>CLIENTE</th>
                        <th>TELEFONO</th>
                        <th>ESTADO</th>
                        <th>VER</th>
                    </thead>
                    <?php if (!empty($this->orders)) : ?>
                        <?php foreach ($this->orders as $order) : ?>
                            <tbody>
                                <tr>

                                    <td class="align-middle" style="color: black;">
                                        <?php echo $order['order_id'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $order['ammount'] ?> productos
                                    </td>
                                    <td class="align-middle">S/
                                        <?php echo $order['shippingPrice'] ?>
                                    </td>
                                    <td class="align-middle">S/
                                        <?php echo $order['totalNetPrice'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $order['province'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $order['district'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $order['client'] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $order['phoneNumber'] ?>
                                    </td>

                                    <td class="align-middle">
                                        <form action="<?php echo constant('URL'); ?>admin/ordersAdmin/edit/<?php echo $order['order_id']; ?>" method="POST">
                                            <div class="input-group">
                                                <select class="form-select <?php echo intval($order['status']) === 0 ? 'select-pendiente' : (intval($order['status']) === 1 ? 'select-en-curso' : (intval($order['status']) === 2 ? 'select-entregado' : 'select-cancelado')); ?>" name="status" id="status">
                                                    <option value="0" <?php echo intval($order['status']) === 0 ? 'selected' : ''; ?>>Pendiente</option>
                                                    <option value="1" <?php echo intval($order['status']) === 1 ? 'selected' : ''; ?>>En curso</option>
                                                    <option value="2" <?php echo intval($order['status']) === 2 ? 'selected' : ''; ?>>Entregado</option>
                                                    <option value="3" <?php echo intval($order['status']) === 3 ? 'selected' : ''; ?>>Anulado</option>
                                                </select>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="align-middle">
                                        <a href="<?php echo  constant('URL'); ?>admin/ordersAdmin/detail/<?php echo $order['order_id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="no-orders-message">
                            <h3>Aún no se han registrado ordenes.</h3>
                        </div>
                    <?php endif; ?>
                </table>
            </div>
            <?php require 'views/components/admin/footer.php'; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script>
            const selectElements = document.querySelectorAll('#status');

            selectElements.forEach((selectElement) => {
                selectElement.addEventListener('change', function () {
                    this.closest('form').submit();
                });
            });
        </script>
</body>

</html>