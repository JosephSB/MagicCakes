<?php
$BASE_URL = constant('URL') . "public";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require 'views/components/head.php'; ?>
  <title>Admin | Magic Cakes</title>
  <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/css/admin/home.css">
</head>

<body>
  <div class="admin-container">
    <?php require 'views/components/admin/aside.php'; ?>
    <div class="admin-main">
      <?php require 'views/components/admin/header.php'; ?>
      <div class="admin-home">
        <div class="container-card">
          <div class="card">
            <div class="card-left">
              <i class="fa fa-shopping-cart" id="icon1"></i>
            </div>
            <div class="card-right">
              <h3>PRODUCTOS</h3>
              <p class="number">
                <?php echo $this->products; ?>
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-left">
              <i class="fa fa-file-alt" id="icon2"></i>
            </div>
            <div class="card-right">
              <h3>ORDENES</h3>
              <p class="number">
                <?php echo $this->orders; ?>
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-left">
              <i class="fa fa-truck" id="icon3"></i>
            </div>
            <div class="card-right">
              <h3> EN CAMINO</h3>
              <p class="number">
                <?php echo $this->delivery; ?>
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-left">
              <i class="fa fa-bullhorn" id="icon4"></i>
            </div>
            <div class="card-right">
              <h3>RECLAMOS</h3>
              <p class="number">
                <?php echo $this->claims; ?>
              </p>
            </div>
          </div>
        </div>
        <div class="home-bottom">
          <div class="container-products-ventas">
            <div class="container-top">
              <span class="titulo">PRODUCTOS MAS VENDIDOS</span>
              <form method="POST">
                <div class="mes-selector">
                  <span>Show:</span>
                  <select name="mes" class="box" id="select">
                    <option value="1" <?php if (date('n') == 1)
                      echo 'selected'; ?>>Enero</option>
                    <option value="2" <?php if (date('n') == 2)
                      echo 'selected'; ?>>Febrero</option>
                    <option value="3" <?php if (date('n') == 3)
                      echo 'selected'; ?>>Marzo</option>
                    <option value="4" <?php if (date('n') == 4)
                      echo 'selected'; ?>>Abril</option>
                    <option value="5" <?php if (date('n') == 5)
                      echo 'selected'; ?>>Mayo</option>
                    <option value="6" <?php if (date('n') == 6)
                      echo 'selected'; ?>>Junio</option>
                    <option value="7" <?php if (date('n') == 7)
                      echo 'selected'; ?>>Julio</option>
                    <option value="8" <?php if (date('n') == 8)
                      echo 'selected'; ?>>Agosto</option>
                    <option value="9" <?php if (date('n') == 9)
                      echo 'selected'; ?>>Septiembre</option>
                    <option value="10" <?php if (date('n') == 10)
                      echo 'selected'; ?>>Octubre</option>
                    <option value="11" <?php if (date('n') == 11)
                      echo 'selected'; ?>>Noviembre</option>
                    <option value="12" <?php if (date('n') == 12)
                      echo 'selected'; ?>>Diciembre</option>
                  </select>
                </div>
              </form>

            </div>


            <!--<script>
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
            <div class="container-bottom" id="dalecrema">

            </div>


            <!--  
            <div class="container-bottom">
              <?php if (!empty($this->productsSell)): ?>
                <?php foreach ($this->productsSell as $productsSell): ?>
                  <div class="tarjeta">
                    <div class="product-left">

                      <img src="<?php echo $productsSell['urllmage'] ?>" alt="Imagen de la torta">

                      <div class="informacion">
                        <h3>
                          <?php echo $productsSell['title'] ?>
                        </h3>
                        <p>
                          <?php echo $productsSell['description'] ?>
                        </p>
                      </div>
                    </div>
                    <div class="product-right">
                      <p class="precio">TOTAL:
                        <?php echo $productsSell['total_ventas'] ?>
                      </p>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
              <?php endif; ?>
-->
            <!--      <div class="container-products-ventas">
        <div class="container-top">
            <span class="titulo">VENTAS</span>
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
        </div>-->
          </div>
        </div>
        <?php require 'views/components/admin/footer.php'; ?>
        <script src="<?php echo $BASE_URL; ?>/js/admin/ListPurchasedProducts.js"></script>
      </div>
    </div>
</body>

</html>