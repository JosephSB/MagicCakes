<header class="header">
    <nav>
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars fa-xs" style="color: #000000;"></i>
        </label>
        <a href="<?php echo  constant('URL'); ?>">
            <img src="<?php echo  $BASE_URL; ?>/assets/magiccakes.png" height="50px" />
        </a>

        <ul>
            <li><a class="navegacion" href="<?php echo  constant('URL'); ?>stores">Nuestras tiendas</a></li>
            <li><a class="navegacion" href="<?php echo  constant('URL'); ?>products">Nuestra Carta</a></li>
            <li><a class="navegacion" href="<?php echo  constant('URL'); ?>orders">Mis Ordenes</a></li>
        </ul>
        <div class="icon-right">
            <a href="<?php echo  constant('URL'); ?>favs">
                <i class="fa-regular fa-heart fa-lg" style="color: #000000;"></i>
            </a>
            <a href="<?php echo  constant('URL'); ?>mycart">
                <i class="fa-sharp fa-solid fa-cart-shopping fa-lg" style="color: #000000;"><span id="mycart" class="items-cart d-none">0</span></i>
            </a>
        </div>
    </nav>
</header>
