<?php 
    class productsAdmin extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->loadModel('productsAdmin');
            $products = $this->model->getProductsAdmin();
        
            $this->view->products = $products;
            $this->view->render('Admin/ProductsAdmin');
        }

    }

?>