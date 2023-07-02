<?php 

    class Admin extends Controller{
        function __construct(){
            session_start();
            if( !isset($_SESSION['user_id']) && $_SESSION['role'] !== "admin"){
                header("Location: ".constant('URL')."");
                return;
            }
            parent::__construct();
        }

        function render(){
            $this->loadModel('home');

            $products = $this->model->getActiveProducts();
            $this->view->products = $products;

            $orders = $this->model->getStatusOrders();
            $this->view->orders = $orders;

            $delivery = $this->model->getStatusDelivery();
            $this->view->delivery = $delivery;

            $claims = $this->model->getClaimsStatus();
            $this->view->claims = $claims;
            
            $this->view->render('Admin/index');
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

        public function usersAdmin($params = []){
            require_once 'Admin/usersAdmin.php';
            $controler = new usersAdmin();
            $controler->loadModel('usersAdmin');

            if(empty($params)) {
                $controler->render();
                return;
            }
            if(isset($params[1])) $controler-> {$params[0]}($params[1]);
            else $controler-> {$params[0]}($params);
        }

        public function claimsAdmin($params = []){
            require_once 'Admin/claimsAdmin.php';
            $controler = new claimsAdmin();
            $controler->loadModel('claimsAdmin');

            if(empty($params)) {
                $controler->render();
                return;
            }
            if(isset($params[1])) $controler-> {$params[0]}($params[1]);
            else $controler-> {$params[0]}($params);
        }

    }

?>