<?php 

    class products extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->Render('ListProducts');
        }

        function detail($params){
            // Obtener el ID del producto 
            $this->loadModel('products');
             $id = $params[0];
        
            // Obtener la información del producto del modelo
            $product = $this->model->getDetailsProducts($id);
            
            $this->view->product = $product[0];

            // Mostrar la vista de detalles del producto
            $this->view->Render('ProductsDetails');
        }

    }

?>