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
            $controler-> {$params[0]}();
        }

    }

?>