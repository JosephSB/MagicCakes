<?php 

    class Admin extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->Render('Admin/index');
        }

        public function productsAdmin($params = []){
            require_once 'Admin/productsAdmin.php';
            $controler = new productsAdmin();
            $controler->loadModel('productsAdmin');

            if(empty($params)) {
                $controler->render();
                return;
            }
            if(isset($params[1])) $controler-> {$params[0]}($params[1]);
            else $controler-> {$params[0]}($params);
        }

        public function ordersAdmin($params = []){
            require_once 'Admin/ordersAdmin.php';
            $controler = new ordersAdmin();
            $controler->loadModel('ordersAdmin');

            if(empty($params)) {
                $controler->render();
                return;
            }
            if(isset($params[1])) $controler-> {$params[0]}($params[1]);
            else $controler-> {$params[0]}($params);
        }

    }

?>