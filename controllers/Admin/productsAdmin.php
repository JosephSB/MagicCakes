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

        function crear(){
            $data = $_POST;
            
            if( empty($data['title']) && empty($data['description']) ){
                $this->view->message = '';
                $this->view->Render('Admin/CreateProducts');
                return;
            }

            if( empty($data['title']) ){
                $this->view->message = 'Titulo invalido';
                $this->view->Render('Admin/CreateProducts');
                return;
            }
            
            if( empty($data['description']) ){
                $this->view->message = 'Descripcion invalida';
                $this->view->Render('Admin/CreateProducts');
                return;
            }

            if (strlen($data['description']) > 200) {
                $this->view->message = 'La descripción debe tener máximo 200 caracteres';
                $this->view->Render('Admin/CreateProducts');
                return;
            }

            if( empty($data['price']) ){
                $this->view->message = 'Precio invalido';
                $this->view->Render('Admin/CreateProducts');
                return;
            }

            if( empty($data['stock']) ){
                $this->view->message = 'Stock invalido';
                $this->view->Render('Admin/CreateProducts');
                return;
            }

            if( empty($data['url']) ){
                $this->view->message = 'Portada invalida';
                $this->view->Render('Admin/CreateProducts');
                return;
            }

            $this->loadModel("products");

            $resp = $this->model->createProducts($data);

            if(!$resp){
                $this->view->message = 'Ocurrio un error';
                $this->view->render('Admin/ProductsAdmin');
                return;
            }
            header("Location: ".constant('URL')."admin/productsAdmin");
        }

        function edit($idProduct){
            $data = $_POST;

            $this->loadModel("products");
            $datProduct = $this->model->getDetailsProducts($idProduct);
            $this->view->data = $datProduct[0];
            $this->view->idProduct=$idProduct;

            if( empty($data['title']) && empty($data['description']) ){
                $this->view->message = '';
                $this->view->Render('Admin/EditProduct');
                return;
            }

            if( empty($data['title']) ){
                $this->view->message = 'Titulo invalido';
                $this->view->Render('Admin/EditProduct');
                return;
            }
            
            if( empty($data['description']) ){
                $this->view->message = 'Descripcion invalida';
                $this->view->Render('Admin/EditProduct');
                return;
            }

            if (strlen($data['description']) > 200) {
                $this->view->message = 'La descripción debe tener máximo 200 caracteres';
                $this->view->Render('Admin/EditProduct');
                return;
            }

            if( empty($data['price']) ){
                $this->view->message = 'Precio invalido';
                $this->view->Render('Admin/EditProduct');
                return;
            }

            if( empty($data['stock']) ){
                $this->view->message = 'Stock invalido';
                $this->view->Render('Admin/EditProduct');
                return;
            }

            if( empty($data['url']) ){
                $this->view->message = 'Portada invalida';
                $this->view->Render('Admin/EditProduct');
                return;
            }
            
            $resp = $this->model->editProducts($idProduct, $data);

            if(!$resp){
                //$this->view->idProduct=$idProduct;
                $this->view->message = 'Ocurrio un error';
                $this->view->render('Admin/EditProduct');
                return;
            }
            header("Location: ".constant('URL')."admin/productsAdmin");
        }

        function delete($idProduct){
            $this->loadModel("products");
            $resp = $this->model->deleteProducts($idProduct);

            header("Location: ".constant('URL')."admin/productsAdmin");
        }
    }

?>