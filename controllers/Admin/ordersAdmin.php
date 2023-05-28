<?php 
    class ordersAdmin extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->loadModel('ordersAdmin');
            $orders = $this->model->getOrdersAdmin();
        
            $this->view->orders = $orders;
            $this->view->render('Admin/OrdersAdmin');
        }

    }

?>