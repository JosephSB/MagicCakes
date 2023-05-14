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
            $userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
            $dataQuery = $this->model->getAllProducts($ORDER, $SEARCHTEXT,$userID);
            //echo $_SESSION['user_id'];
            echo $this->sendJson($dataQuery, true);
        }

        public function getPopularProducts(){
            session_start();

            $userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
            $dataQuery = $this->model->getPopularProducts($userID);

            echo $this->sendJson($dataQuery, true);
        }

        public function favProduct($productID){
            session_start();

            if(!isset($productID) || empty($productID)){
                echo json_encode(
                    array(
                        'status' => 200, 
                        'operation'=> false, 
                        'error' => "No envio id del producto"
                    )
                );
                return;
            }

            if(!isset($_SESSION['user_id'])){
                echo json_encode(
                    array(
                        'status' => 200, 
                        'operation'=> false, 
                        'error' => "No esta autenticado"
                    )
                );
                return;
            }

            $resp = $this->model->favProductByProductID($productID, $_SESSION['user_id']);

            if($resp["operation"]){
                echo $this->sendJson($resp["isFav"], true);
                return;
            }
            echo $this->sendJson($resp["isFav"], false);
            return;
        }

    }

?>