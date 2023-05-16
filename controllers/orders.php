<?php 

class orders extends Controller {
    function __construct() {
        parent::__construct();
        
    }

    function render() {
        session_start();
        $user_id = $_SESSION['user_id'];
        $this->loadModel('orders'); // Asignar el modelo adecuado aquí
        $orders = $this->model->getMyOrders($user_id);
        
        $this->view->orders = $orders; // Pasar los resultados a la vista
        $this->view->render('Orders');
    }
}

?>