<?php 

    class shoppingCartApi extends Controller{
        function __construct(){
            parent::__construct();
        }

        public function getShoppingCart(){
            session_start();

            if(!isset($_SESSION['user_id'])){
                echo $this->sendJson("No esta autenticado", false);
                return;
            }

            $user_id = $_SESSION['user_id'];
            $dataQuery["data"] = $this->model->findProductsInShoppingCart($user_id);
            $dataQuery["total"] = $this->model->findTotalProductsInShoppingCart($user_id);
            echo $this->sendJson($dataQuery, true);
        }


        public function getTotalProductsInCart(){
            session_start();

            if(!isset($_SESSION['user_id'])){
                echo $this->sendJson("No esta autenticado", false);
                return;
            }

            $user_id = $_SESSION['user_id'];
            $dataQuery = $this->model->findTotalProductsInShoppingCart($user_id);
            echo $this->sendJson($dataQuery, true);
        }

        public function addProduct(){
            session_start();

            if(!isset($_SESSION['user_id'])){
                echo $this->sendJson("No esta autenticado", false);
                return;
            }

            $user_id = $_SESSION['user_id'];
            $data = json_decode(file_get_contents('php://input'), true);
            $ammount = isset($data['ammount']) ? $data['ammount'] : 0;
            $item_id = isset($data['productID']) ? $data['productID'] : "";

            if($this->model->addItemToShoppingCart($user_id, $ammount, $item_id)){
                echo $this->sendJson("producto agregado exitosamente", true);
                return;
            }
            echo $this->sendJson("ocurrio un error", false);

        }

        public function updateProduct(){
            session_start();

            if(!isset($_SESSION['user_id'])){
                echo $this->sendJson("No esta autenticado", false);
                return;
            }

            $user_id = $_SESSION['user_id'];
            $data = json_decode(file_get_contents('php://input'), true);
            $ammount = isset($data['ammount']) ? $data['ammount'] : 0;
            $rowId = isset($data['id']) ? $data['id'] : null;
            if($this->model->updateItemFromShoppingCart($user_id,$ammount, $rowId)){
                echo $this->sendJson("producto actulizado exitosamente", true);
                return;
            }
            echo $this->sendJson("ocurrio un error", false);
        }

        public function removeProduct($id){
            session_start();

            if(!isset($_SESSION['user_id'])){
                echo $this->sendJson("No esta autenticado", false);
                return;
            }

            $user_id = $_SESSION['user_id'];
            $rowId = (!isset($id) || empty($id)) ? "" : $id;
            if($this->model->removeItemFromShoppingCart($user_id, $rowId)){
                echo $this->sendJson("producto eliminado exitosamente", true);
                return;
            }
            echo $this->sendJson("ocurrio un error", false);
        }

    }

?>