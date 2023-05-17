<?php 

    class shoppingCartApi extends Controller{
        function __construct(){
            parent::__construct();
        }

        public function getShoppingCart(){
            session_start();

            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
            $dataQuery = $this->model->findProductsInShoppingCart($user_id);

            echo $this->sendJson($dataQuery, true);
        }


        public function getTotalProductsInCart(){
            session_start();

        }

        public function addProduct(){
            session_start();

        }

        public function updateProduct(){
            session_start();

        }

        public function removeProduct(){
            session_start();

        }

    }

?>