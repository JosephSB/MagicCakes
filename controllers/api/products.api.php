<?php 

    class productsApi extends Controller{
        function __construct(){
            parent::__construct();
        }

        public function getAllProducts(){
            session_start();
            
            $data = json_decode(file_get_contents('php://input'), true);
            $ORDER = isset($data['order']) ? $data['order'] : "0";
            $SEARCHTEXT = isset($data['search']) ? $data['search'] : "";
            $dataQuery = $this->model->getAllProducts($ORDER, $SEARCHTEXT);
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