<?php 

    class productsApi extends Controller{
        function __construct(){
            parent::__construct();
        }

        public function getAllProducts(){
            $dataQuery = $this->model->getAllProducts();

            echo $this->sendJson($dataQuery, true);
        }

    }

?>