<?php 

    class AdminApi extends Controller{
        function __construct(){
            parent::__construct();
        }

        public function getProductsMorePurchased(){
            session_start();

            if(!isset($_SESSION['user_id'])){
                echo $this->sendJson("No esta autenticado", false);
                return;
            }

            $user_id = $_SESSION['user_id'];
            $month = isset( $_GET['mes']) ?   $_GET['mes'] : date('n');

            $productsSell = $this->model->getProductSell($month);


            echo $this->sendJson( $productsSell , true);

        }

    }

?>