<aside class="admin-aside">
    <a class="menu-img" href="<?php echo  constant('URL'); ?>admin">
        <img src="<?php echo  $BASE_URL; ?>/assets/magiccakes.png" height="50px" />
    </a>
    <div class="menu-item" id="productsLink">
        <a href="<?php echo  constant('URL'); ?>admin/productsAdmin">
            <i class="fa fa-cubes"></i>
            <div class="menu-text">PRODUCTOS</div>
        </a>
    </div>
    <div class="menu-item" id="ordersLink">
        <a href="<?php echo  constant('URL'); ?>admin/ordersAdmin">
            <i class="fa fa-clipboard-list"></i>
            <div class="menu-text">ORDENES</div>
        </a>
    </div>
    <div class="menu-item" id="usersLink">
        <a href="<?php echo  constant('URL'); ?>admin/usersAdmin">
            <i class="fa fa-users"></i>
            <div class="menu-text">USUARIOS</div>
        </a>
    </div>
    <div class="menu-item" id="claimsLink">
        <a href="<?php echo  constant('URL'); ?>admin/claimsAdmin">
            <i class="fa fa-bullhorn"></i>
            <div class="menu-text">RECLAMOS</div>
        </a>
    </div>
</aside>

<script>
    // Obtener la URL actual
    var currentUrl = window.location.href;

    // Verificar si la URL contiene una cierta cadena
    if (currentUrl.includes("productsAdmin")) {
        document.getElementById("productsLink").classList.add("active");
    } else if (currentUrl.includes("ordersAdmin")) {
        document.getElementById("ordersLink").classList.add("active");
    } else if (currentUrl.includes("usersAdmin")) {
        document.getElementById("usersLink").classList.add("active");
    } else if (currentUrl.includes("claimsAdmin")) {
        document.getElementById("claimsLink").classList.add("active");
    }
</script>