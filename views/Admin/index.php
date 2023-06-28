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
            <div class="container-card">
  <div class="card">
    <div class="card-left">
      <i class="fa fa-shopping-cart" id="icon1"></i>
    </div>
    <div class="card-right">
      <h3>PRODUCTOS</h3>
      <p class="number">15</p>
    </div>
  </div>

  <div class="card">
    <div class="card-left">
      <i class="fa fa-file-alt" id="icon2"></i>
    </div>
    <div class="card-right">
      <h3>ORDENES</h3>
      <p class="number">8</p>
    </div>
  </div>

  <div class="card">
    <div class="card-left">
      <i class="fa fa-truck" id="icon3"></i>
    </div>
    <div class="card-right">
      <h3> EN CAMINO</h3>
      <p class="number">2</p>
    </div>
  </div>

  <div class="card">
    <div class="card-left">
      <i class="fa fa-bullhorn" id="icon4"></i>
    </div>
    <div class="card-right">
      <h3>RECLAMOS</h3>
      <p class="number">2</p>
    </div>
  </div>
</div>
<div class="container-products">
  <div class="container-top">
    <span class="titulo">PRODUCTOS MAS VENDIDOS</span>
    <div class="mes-selector" onclick="mostrarMeses()">
      <span>Show:</span>

      <span id="mes-seleccionado">Enero</span>
      <span class="mes-selector-icon">&#9660;</span>
      <div class="meses-container" id="meses-container">
        <div class="mes" onclick="seleccionarMes('Enero')">Enero</div>
        <div class="mes" onclick="seleccionarMes('Febrero')">Febrero</div>
        <div class="mes" onclick="seleccionarMes('Marzo')">Marzo</div>
        <div class="mes" onclick="seleccionarMes('Abril')">Abril</div>
        <div class="mes" onclick="seleccionarMes('Mayo')">Mayo</div>
        <div class="mes" onclick="seleccionarMes('Junio')">Junio</div>
        <div class="mes" onclick="seleccionarMes('Julio')">Julio</div>
        <div class="mes" onclick="seleccionarMes('Agosto')">Agosto</div>
        <div class="mes" onclick="seleccionarMes('Septiembre')">Septiembre</div>
        <div class="mes" onclick="seleccionarMes('Octubre')">Octubre</div>
        <div class="mes" onclick="seleccionarMes('Noviembre')">Noviembre</div>
        <div class="mes" onclick="seleccionarMes('Diciembre')">Diciembre</div>
      </div>
    </div>
  </div>

  <!--
  <script>
  const mesSelector = document.querySelector('.mes-selector');
  const mesesContainer = document.getElementById('meses-container');
  const mesSeleccionado = document.getElementById('mes-seleccionado');

  function mostrarMeses() {
    mesesContainer.style.display = mesesContainer.style.display === 'block' ? 'none' : 'block';
  }

  function seleccionarMes(mes) {
    mesSeleccionado.textContent = mes;
    mesesContainer.style.display = 'none';
  }
</script>-->
  <div class="container-bottom">
    <div class="tarjeta">
      <div class="product-left">

        <img
          src="https://dxnn4n4cam0ol.cloudfront.net/media/catalog/product/n/u/nueva_foto_torta_de_chocolate_12_porciones_.jpeg"
          alt="Imagen de la torta 1">

        <div class="informacion">
          <h3>TORTA DE CHOCOLATE</h3>
          <p>12 PZ EASTER</p>
        </div>
      </div>
      <div class="product-right">
        <p class="precio">TOTAL:120</p>
      </div>
    </div>

    <div class="tarjeta">
      <div class="product-left">

        <img
          src="https://dxnn4n4cam0ol.cloudfront.net/media/catalog/product/n/u/nueva_foto_torta_de_chocolate_12_porciones_.jpeg"
          alt="Imagen de la torta 1">

        <div class="informacion">
          <h3>TORTA DE CHOCOLATE</h3>
          <p>12 PZ EASTER</p>
        </div>
      </div>
      <div class="product-right">
        <p class="precio">TOTAL:120</p>
      </div>
    </div>

    <div class="tarjeta">
      <div class="product-left">

        <img
          src="https://dxnn4n4cam0ol.cloudfront.net/media/catalog/product/n/u/nueva_foto_torta_de_chocolate_12_porciones_.jpeg"
          alt="Imagen de la torta 1">

        <div class="informacion">
          <h3>TORTA DE CHOCOLATE</h3>
          <p>12 PZ EASTER</p>
        </div>
      </div>
      <div class="product-right">
        <p class="precio">TOTAL:120</p>
      </div>
    </div>
  </div>
</div>
            </div>
            <?php require 'views/components/admin/footer.php';  ?>
        </div>
    </div>
</body>
</html>