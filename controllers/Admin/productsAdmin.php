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

            if( empty($data['title']) && empty($data['description']) && empty($data['price'])  && empty($data['url']) ){
                $this->view->message = 'Formulario Invalido';
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

            if( empty($data['title']) && empty($data['description']) && empty($data['price']) && empty($data['stock'])  && empty($data['url']) ){
                $this->view->message = 'Formulario Invalido';
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