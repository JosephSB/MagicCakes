<?php 

    class favs extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            session_start();
            
            if (!isset($_SESSION['user_id']) && $_SESSION['role'] !== "admin") {
                header("Location: " . constant('URL') . "");
                return;
            }

            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
            $this->loadModel('products'); // Asignar el modelo adecuado aquí
            $orders = $this->model->getMyFavs($user_id);

            $this->view->orders = $orders; 
            $this->view->Render('Favs');

        }

    }

?>