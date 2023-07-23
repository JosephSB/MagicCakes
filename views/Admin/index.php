<?php
$BASE_URL = constant('URL') . "public";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require 'views/components/head.php'; ?>
  <title>Admin | Magic Cakes</title>
  <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/css/admin/home.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation"></script>
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
          <div class="container-grafic">
            <canvas id="myChart" width="90%" style="max-height: 400px;" data-metadata="<?php echo $this->dataGraphic; ?>"></canvas>
          </div>
          <div class="container-products-ventas" style="max-width: 80%;">
            <div class="container-top">
              <span class="titulo">PRODUCTOS MAS VENDIDOS</span>
              <form method="POST">
                <div class="mes-selector">
                  <span>Show:</span>
                  <select name="mes" class="box" id="select">
                    <?php
                    $mesActual = date('n');
                    $mesesEnEspanol = array(
                      1 => 'Enero',
                      2 => 'Febrero',
                      3 => 'Marzo',
                      4 => 'Abril',
                      5 => 'Mayo',
                      6 => 'Junio',
                      7 => 'Julio',
                      8 => 'Agosto',
                      9 => 'Septiembre',
                      10 => 'Octubre',
                      11 => 'Noviembre',
                      12 => 'Diciembre'
                    );

                    for ($mes = 1; $mes <= $mesActual; $mes++) {
                      $nombreMes = $mesesEnEspanol[$mes];
                      echo "<option value='$mes'";
                      if ($mes === $mesActual) {
                        echo ' selected';
                      }
                      echo ">$nombreMes</option>";
                    }
                    ?>
                  </select>
                </div>
              </form>

            </div>

            <div class="container-bottom" id="dalecrema"></div>
            <?php if (!empty($this->productsSell)) : ?>
              <?php foreach ($this->productsSell as $productsSell) : ?>
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
            <?php else : ?>
            <?php endif; ?>
          </div>
        </div>
        <?php require 'views/components/admin/footer.php'; ?>
        <script src="<?php echo $BASE_URL; ?>/js/admin/HomeChart.js"></script>
        <script src="<?php echo $BASE_URL; ?>/js/admin/ListPurchasedProducts.js"></script>
      </div>
    </div>
</body>

</html>