<?php 

    class Admin extends Controller{
        function __construct(){
            parent::__construct();
        }

        public function productsAdmin(){
            require_once 'Admin/productsAdmin.php';
            $controller = new productsAdmin();
            $controller->render();
        }

        public function ordersAdmin(){
            require_once 'Admin/ordersAdmin.php';
            $controller = new ordersAdmin();
            $controller->render();
        }

    }

?>