<?php 
    class productsAdmin extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $products = $this->model->getProductsAdmin();
        
            $this->view->products = $products;
            $this->view->render('Admin/ProductsAdmin');
        }

        function edit($idProduct){
            $this->view->render('Admin/ProductsAdmin');
        }

        function delete($idProduct){
            $this->view->render('Admin/ProductsAdmin');
        }
    }

?>