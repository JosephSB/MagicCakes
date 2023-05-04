<?php 

    class productsApi extends Controller{
        function __construct(){
            parent::__construct();
        }

        public function getAllProducts(){
            session_start();
            $dataQuery = $this->model->getAllProducts();
            //echo $_SESSION['user_id'];
            echo $this->sendJson($dataQuery, true);
        }

        public function getPopularProducts(){
            session_start();
            $dataQuery = $this->model->getPopularProducts();
            //echo $_SESSION['user_id'];
            echo $this->sendJson($dataQuery, true);
        }

    }

?>