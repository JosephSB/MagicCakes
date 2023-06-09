<?php 

    class api extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            //$this->view->Render('Home/index');
        }

        public function products($params){
            require_once 'api/products.api.php';
            $controler = new productsApi();
            $controler->loadModel('products');
            if(isset($params[1])) $controler-> {$params[0]}($params[1]);
            else $controler-> {$params[0]}($params);
        }

        public function cart($params){
            require_once 'api/shoppingCart.api.php';
            $controler = new shoppingCartApi();
            $controler->loadModel('shoppingCart');
            if(isset($params[1])) $controler-> {$params[0]}($params[1]);
            else $controler-> {$params[0]}($params);
        }

        public function orders($params){
            require_once 'api/orders.api.php';
            $controler = new OrdersApi();
            $controler->loadModel('orders');
            if(isset($params[1])) $controler-> {$params[0]}($params[1]);
            else $controler-> {$params[0]}($params);
        }

        public function admin($params){
            require_once 'api/admin.api.php';
            $controler = new AdminApi();
            $controler->loadModel('home');
            if(isset($params[1])) $controler-> {$params[0]}($params[1]);
            else $controler-> {$params[0]}($params);
        }


    }

?>